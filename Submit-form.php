<?php

require 'vendor/autoload.php'; // Include autoload from composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have fields 'name', 'email', and 'message' in your form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set the cell values
    $sheet->setCellValue('A1', 'Name');
    $sheet->setCellValue('B1', 'Email');
    $sheet->setCellValue('C1', 'Message');
    $sheet->setCellValue('A2', $name);
    $sheet->setCellValue('B2', $email);
    $sheet->setCellValue('C2', $message);

    // Save the spreadsheet to a file
    $writer = new Xlsx($spreadsheet);
    $writer->save('submissions.xlsx');

    // Send success response or redirect
    echo 'Form submitted successfully!';
} else {
    // Not a POST request, display an error or redirect
    echo 'Error: You must submit the form!';
}

?>
