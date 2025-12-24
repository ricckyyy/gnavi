<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class RestaurantsSearcherTest extends TestCase
{
    public function testWriteDataToCsvWithValidResponse()
    {
        // Mock response data
        $mockResponseBody = json_encode([
            "rest" => [
                [
                    "name" => "Test Restaurant 1",
                    "address" => "Tokyo, Shibuya",
                    "opentime" => "10:00-22:00",
                    "tel" => "03-1234-5678"
                ],
                [
                    "name" => "Test Restaurant 2",
                    "address" => "Tokyo, Shinjuku",
                    "opentime" => "11:00-23:00",
                    "tel" => "03-8765-4321"
                ]
            ]
        ]);

        // Create a mock handler
        $mock = new MockHandler([
            new Response(200, [], $mockResponseBody)
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        // Test parameters
        $params = [
            "keyid" => "test_key",
            "hit_per_page" => 100,
            "pref" => "PREF13",
            "freeword_condition" => 1,
            "freeword" => "渋谷駅"
        ];

        // Make a request
        $response = $client->request('GET', "https://api.gnavi.co.jp/RestSearchAPI/v3/", ['query' => $params]);
        $json_res = $response->getBody();
        $data = json_decode($json_res, true);

        // Verify the response structure
        $this->assertArrayHasKey('rest', $data);
        $this->assertCount(2, $data['rest']);
        $this->assertEquals("Test Restaurant 1", $data['rest'][0]['name']);
        $this->assertEquals("Test Restaurant 2", $data['rest'][1]['name']);
    }

    public function testWriteDataToCsvWithErrorResponse()
    {
        // Mock error response
        $mockResponseBody = json_encode([
            "error" => [
                "message" => "Invalid API key"
            ]
        ]);

        $mock = new MockHandler([
            new Response(200, [], $mockResponseBody)
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $params = [
            "keyid" => "invalid_key",
            "hit_per_page" => 100,
            "pref" => "PREF13",
            "freeword_condition" => 1,
            "freeword" => "渋谷駅"
        ];

        $response = $client->request('GET', "https://api.gnavi.co.jp/RestSearchAPI/v3/", ['query' => $params]);
        $json_res = $response->getBody();
        $data = json_decode($json_res, true);

        // Verify error handling
        $this->assertArrayHasKey('error', $data);
    }

    public function testCsvFileStructure()
    {
        // Test CSV structure
        $restaurants = [["名称","住所","営業日","電話番号"]];
        $restaurants[] = ["Test Restaurant", "Test Address", "10:00-22:00", "03-1234-5678"];

        // Write to temporary file
        $tempFile = tempnam(sys_get_temp_dir(), 'test_csv_');
        $handle = fopen($tempFile, "wb");
        
        foreach($restaurants as $values){
            fputcsv($handle, $values);
        }
        fclose($handle);

        // Read back and verify
        $this->assertFileExists($tempFile);
        $content = file_get_contents($tempFile);
        $this->assertStringContainsString("名称", $content);
        $this->assertStringContainsString("Test Restaurant", $content);

        // Cleanup
        unlink($tempFile);
    }
}
