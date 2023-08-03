<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use BM\Books\Models\Books; // Make sure to import the correct model




class UserController extends Controller
{
    public function exportUsers()
    {
        // Fetch data from the database (assuming you have a Books model)
        $users = Books::all(); // Update the model name to Books
        // Set the file response headers
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ];
        // Generate the CSV file and send it as a response
        return Response::stream(function () use ($users) {
            $output = fopen('php://output', 'w');
            // Add a header row
            fputcsv($output, ['id', 'book_name', 'book_price', 'category_id','author', 'description', 'publication_date','language','publisher','stock_quantity','created_at','updated_at']);

            // Add data rows
            foreach ($users as $user) {
                fputcsv($output, [$user->id, $user->book_name, $user->book_price, $user->category_id,$user->author, $user->description,$user->publication_date, $user->language, $user->publisher, $user->stock_quantity,$user->created_at, $user->updated_at]);
            }
            fclose($output);
        }, 200, $headers);
    }
}
?>