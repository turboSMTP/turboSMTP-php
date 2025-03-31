<?php

namespace TurboSMTPTests\Suppressions;

use DateTime;
use TurboSMTP\TurboSMTPClient;
use TurboSMTPTests\AppConstants;
use TurboSMTPTests\BaseTestCase;

class Add extends BaseTestCase
{
    public function test_add_with_3_valid_and_2_invalid_addresses()
    {
        // Arrange
        $ts_client = new TurboSMTPClient($this->configuration);
        $emailAddressesToAdd = [
            sprintf("%s-test1.multiple@gmail.com", $this->get_Formated_DateTime_Compressed()),
            sprintf("%s-test2.multiple@gmail.com", $this->get_Formated_DateTime_Compressed()),
            sprintf("%s-test3.multiple@gmail.com", $this->get_Formated_DateTime_Compressed()),
            "testinginvalid",
            "testinginvalid@gmail@hotmail@google.com"
        ];

        // Act
        try {
            $result = $ts_client->GetSuppressions()->addRangeAsync("PHP Adding Multiple - " . $this->get_Formated_DateTime_Compressed(), $emailAddressesToAdd)->wait();

            // Assert
            $this->assertCount(3, $result->getValid());
            $this->assertCount(2, $result->getInvalid());
            $this->assertContains($emailAddressesToAdd[0], $result->getValid());
            $this->assertContains($emailAddressesToAdd[1], $result->getValid());
            $this->assertContains($emailAddressesToAdd[2], $result->getValid());
            $this->assertContains($emailAddressesToAdd[3], $result->getInvalid());
            $this->assertContains($emailAddressesToAdd[4], $result->getInvalid());
        } catch (\Exception $ex) {
            $this->fail($ex->getMessage());
        }
    }

    public function test_add_1_valid()
    {
        // Arrange
        $ts_client = new TurboSMTPClient($this->configuration);
        $emailAddressToAdd = sprintf("%s-valid1.single@gmail.com", $this->get_Formated_DateTime_Compressed());

        // Act
        try {
            $result = $ts_client->GetSuppressions()->addAsync("PHP Adding Single - " . $this->get_Formated_DateTime_Compressed(), $emailAddressToAdd)->wait();
            
            // Assert
            $this->assertCount(1, $result->getValid());
            $this->assertCount(0, $result->getInvalid());
            $this->assertContains($emailAddressToAdd, $result->getValid());
        } catch (\Exception $ex) {
            $this->fail($ex->getMessage());
        }
    }

    public function test_add_1_invalid()
    {
        // Arrange
        $ts_client = new TurboSMTPClient($this->configuration);
        $emailAddressToAdd = sprintf("%s-valid1.single@gmail", $this->get_Formated_DateTime_Compressed());

        // Act
        try {
            $result = $ts_client->GetSuppressions()->addAsync("PHP Adding Single Invalid- " . $this->get_Formated_DateTime_Compressed(), $emailAddressToAdd)->wait();
            
            // Assert
            $this->assertCount(0, $result->getValid());
            $this->assertCount(1, $result->getInvalid());
            $this->assertContains($emailAddressToAdd, $result->getInValid());
        } catch (\Exception $ex) {
            $this->fail($ex->getMessage());
        }
    }    
}