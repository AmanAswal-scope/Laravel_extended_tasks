<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Resources\Views;

class CsvController extends Controller
{
    public function displayCsv()
    {
        // Replace 'C:\Users\Aman.Aswal\Downloads\users (1).csv' with the actual path to your CSV file
        $csvFile = fopen('C:\Users\Aman.Aswal\Downloads\users (1).csv', 'r');

        // Read the header row (optional, if you have header in the CSV file)
        $header = fgetcsv($csvFile);

        // Initialize an array to store the records
        $records = [];

        // Read each row of the CSV file and store it in the $records array
        while (($data = fgetcsv($csvFile)) !== false) {
            $records[] = $data;
        }

        // Close the CSV file
        fclose($csvFile);

        // Pass the $records array to the view
        return view('csv.display', ['records' => $records]);
    }
}

?>