<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title>Accomodation</title>

    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body style="margin:0;padding:20px;">
    <form action="{{ route('emailAccommodation') }}" method="post">
        @csrf
        <table role="presentation"
            style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#fff;">
            <tr>
                <td align="center" style="padding:0;">
                    <table role="presentation"
                        style="width:700px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="background: #f8fafc;">
                                            <img src="https://ioaevent.id/frontend/assets/img/header-blast.jpg"
                                                alt="">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 1 -->
                        <!-- Row 2 -->
                        <tr>
                            <td style="padding: 0;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding: 20px 20px 0 20px; background: #fff;">
                                            <p style="font-size: 14pt; font-weight: bold; color: #1C1C1E;"><input
                                                    type="text" name="satu" value="Dear "> "Nama Peserta"</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 0 20px;">
                                            <p style="border-radius: 8px; font-size: 12pt;"><span
                                                    style="font-weight: bold; color: #16a34a;"><input type="text"
                                                        name="dua" value="Congratulation!"></span> <input
                                                    type="text" name="tiga"
                                                    value="Your accomodation has been confirmed."></p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 36px; margin-bottom: 4px;">
                                                Order Summary</p>
                                            <p
                                                style="font-size: 12pt; margin-top: 0; margin-bottom: 4px; font-weight: 600;">
                                                Reg ID: "Reg ID"</p>

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 2 -->

                        <!-- Row 3 -->
                        <tr>
                            <td style="padding: 0 20px;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0; margin-top: 16px;">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0; width: 70%;">Accomodation</td>
                                        <td style="font-weight: bold;">IDR</td>
                                        <td style="font-weight: bold; text-align: right;">"Nilai Sub Total"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0; width: 70%;">Admin Fee</td>
                                        <td style="font-weight: bold;"> IDR</td>
                                        <td style="font-weight: bold; text-align: right;">"Nominal Admin Fee"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0; width: 70%;">Total</td>
                                        <td style="font-weight: bold;"> IDR</td>
                                        <td style="font-weight: bold; text-align: right;">"Nominal Total"</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 3 -->

                        <!-- Row 4 -->
                        <tr>
                            <td style="padding: 0;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding: 0 20px;">
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 36px; margin-bottom: 4px;">
                                                Description</p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 0; font-weight: bold;">
                                                Booking Details : "ID Booking"</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 4 -->

                        <!-- Row 5 -->
                        <tr>
                            <td style="padding: 0 20px;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Hotel</td>
                                        <td style="font-weight: bold;"> : "Hotel Name"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Check-in/Check-out Date</td>
                                        <td style="font-weight: bold;"> : "Date Check In" - "Date Check Out"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Number of Nights</td>
                                        <td style="font-weight: bold;"> : "Number of Night" </td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Rooms(s) Booked</td>
                                        <td style="font-weight: bold;"> : "Room Booked"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Bed(s) Type</td>
                                        <td style="font-weight: bold;"> : "Bed Type"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Special Request</td>
                                        <td style="font-weight: bold;"> : "Special Request"</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 5 -->

                        <!-- Row 4 -->
                        <tr>
                            <td style="padding: 0;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding: 0 20px;">
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 36px; margin-bottom: 4px;">
                                                Customer Information</p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 4 -->

                        <!-- Row 5 -->
                        <tr>
                            <td style="padding: 0 20px;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Name of Guest</td>
                                        <td style="font-weight: bold;"> : "Nama Tamu"</td>
                                    </tr>
                                    <tr style="border-bottom: 1px solid #ddd;">
                                        <td style="padding: 10px 0;">Mobile Number</td>
                                        <td style="font-weight: bold;"> : "Nomor HP"</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 5 -->

                        <!-- Row 6 -->
                        <tr>
                            <td style="padding: 0;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="padding: 0 20px;">
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 36px; margin-bottom: 4px;">
                                                Cancellation Policy</p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 0; margin-bottom: 4px; color: red; font-weight: bold;">
                                                <input type="text" name="empat"
                                                    value="*Rooms that have been paid cannot be cancelled">
                                            </p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 0; margin-bottom: 4px; color: red; font-weight: bold;">
                                                <input type="text" name="lima"
                                                    value="*Payment are not refundable">
                                            </p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 0; margin-bottom: 4px; color: red; font-weight: bold;">
                                                <input type="text" name="enam"
                                                    value="*Any changes (including hotel, room type, date of check-in, length of stay or guest name) will require manual confirmation by contacting committee KONAS 2022.">
                                            </p>
                                            <p style="border-radius: 8px; font-size: 12pt; margin-top: 36px;"><input
                                                    type="text" name="tujuh"
                                                    value="Thank you for your participation, we look forward to welcoming you to our event.">
                                            </p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin-top: 36px; margin-bottom: 4px;">
                                                Sincerely yours,</p>
                                            <p
                                                style="border-radius: 8px; font-size: 12pt; margin: 0; font-weight: bold;">
                                                <input type="text" name="delapan" value="Committee of KONAS 2022">
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 6 -->



                        <!-- Row 7 -->
                        <tr>
                            <td style="padding: 60px 20px;">
                                <table role="presentation"
                                    style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                    <tr>
                                        <td style="border-top: 1px solid #ddd;">
                                            <p style="font-size: 10pt; color: grey; margin: 4px 0;">This message was
                                                generated
                                                automatically by system. Please do not reply. If you need help, please
                                                contact our
                                                admission.</p>
                                            <p style="font-size: 10pt; color: grey; margin: 4px 0;"><input
                                                    type="text" name="sembilan" value="WA: +62 811-400-501"></p>
                                            <p style="font-size: 10pt; color: grey; margin: 4px 0;"><input
                                                    type="text" name="sepuluh"
                                                    value="Email: admin@indonesia-orthopaedic.org"></p>

                                            <input type="submit" class="btn btn-primary" value="submit">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <!-- End Row 7 -->
                    </table>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
