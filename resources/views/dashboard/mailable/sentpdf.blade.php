<!-- resources/views/emails/transaction_complete.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transaction Complete</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            padding: 20px;
            background-color: transparent;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-wrapper {
            text-align: center;
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #1e40af;
            color: #ffffff !important;
            text-decoration: none !important;
            border-radius: 6px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #374151;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #888;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hello {{ $transaction->user->name ?? 'Guest' }},</h2>

        <p>Thank you for your purchase! Your book transaction has been completed successfully.</p>

        <p><strong>Transaction Details:</strong></p>
        <ul>
            <li><strong>Invoice ID:</strong> #IV-{{ $transaction->id }}</li>
            <li><strong>Book Name:</strong> {{ $transaction->book->title ?? 'N/A' }}</li>
            <li><strong>Price:</strong> {{ number_format($transaction->book->price, 2) ?? 'N/A' }}</li>
            <li><strong>Date:</strong> {{ $transaction->created_at->format('F d, Y') }}</li>
        </ul>

        <p>We've attached a PDF receipt of your transaction for your records.</p>

        <p>If you have any questions, feel free to contact us.</p>

        <div class="btn-wrapper">
            <a href="{{ $transaction->book->documentPath }}" download target="_blank" class="btn">
                📥 Click here to download your book
            </a>
        </div>


        <div class="footer">
            &copy; {{ date('Y') }} Developed with by Fahim Hossain Munna for a better web experience.
        </div>
    </div>
</body>

</html>
