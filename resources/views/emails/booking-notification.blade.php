<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #007AFF 0%, #0056b3 100%);
            color: #ffffff;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 30px 20px;
        }
        .booking-info {
            background-color: #f8f9fa;
            border-left: 4px solid #007AFF;
            padding: 15px;
            margin: 20px 0;
            border-radius: 4px;
        }
        .info-row {
            display: flex;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            width: 180px;
            color: #555;
        }
        .info-value {
            flex: 1;
            color: #333;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
            background-color: #ffc107;
            color: #000;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #007AFF;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        @media only screen and (max-width: 600px) {
            .info-row {
                flex-direction: column;
            }
            .info-label {
                width: 100%;
                margin-bottom: 5px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎉 New Booking Request</h1>
        </div>

        <div class="content">
            <p>Hello Admin,</p>
            <p>You have received a new booking request. Here are the details:</p>

            <div class="booking-info">
                <div class="info-row">
                    <span class="info-label">Customer Name:</span>
                    <span class="info-value">{{ $booking->full_name }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Address:</span>
                    <span class="info-value">{{ $booking->address }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Number of Cars:</span>
                    <span class="info-value">{{ $booking->number_of_cars }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">License Plate:</span>
                    <span class="info-value">{{ $booking->licence_plate }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">WhatsApp:</span>
                    <span class="info-value">{{ $booking->whatsapp }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">Preferred Date:</span>
                    <span class="info-value">{{ $booking->preferred_date->format('F d, Y') }}</span>
                </div>

                @if($booking->package_name)
                <div class="info-row">
                    <span class="info-label">Package:</span>
                    <span class="info-value">{{ $booking->package_name }}</span>
                </div>
                @endif

                @if($booking->package_price)
                <div class="info-row">
                    <span class="info-label">Package Price:</span>
                    <span class="info-value">{{ $booking->package_price }}</span>
                </div>
                @endif

                <div class="info-row">
                    <span class="info-label">Status:</span>
                    <span class="info-value"><span class="status-badge">{{ $booking->status }}</span></span>
                </div>

                <div class="info-row">
                    <span class="info-label">Submitted At:</span>
                    <span class="info-value">{{ $booking->created_at->format('F d, Y h:i A') }}</span>
                </div>
            </div>

            <center>
                <a href="{{ url('/admin/bookings/' . $booking->id) }}" class="button">View in Admin Panel</a>
            </center>

            <p style="margin-top: 30px; color: #666; font-size: 14px;">
                <strong>Quick Actions:</strong><br>
                Contact the customer via WhatsApp: <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->whatsapp) }}" style="color: #007AFF;">{{ $booking->whatsapp }}</a>
            </p>
        </div>

        <div class="footer">
            <p>This is an automated notification from {{ config('app.name') }}.</p>
            <p>IP Address: {{ $booking->ip_address ?? 'N/A' }}</p>
        </div>
    </div>
</body>
</html>
