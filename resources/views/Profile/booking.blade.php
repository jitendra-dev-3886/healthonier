<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Doctor Appointment</title>
<style>
    table {
        font-family: 'Poppins', sans-serif;
        font-size:15px;
    }
</style>
</head>

<body>

    <section>
        <div style="margin: auto; max-width: 800px;min-width: 400px;">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table style="width: 100%;border-collapse: collapse;
                        border: 1px solid #ccc;font-family: 'Poppins', sans-serif;">
                            <tbody>
                                <tr style="padding:10px;border: 1px solid #ccc !important;display: table-row;
                    vertical-align: inherit;
                    border-color: inherit;">
                                    <td style="padding:10px;display: table-cell;
                        vertical-align: inherit;
                        font-weight: bold;;text-align: center;" colspan="3"> 
                        <img src="https://healthonier.com/assets/img/logo.png" height="80px" alt="">
                                    </td>
                                    </tr>
                                <tr style="padding:10px;border: 1px solid #ccc !important;display: table-row;
                    vertical-align: inherit;
                    border-color: inherit;font-family: 'Poppins', sans-serif;">
                                    <td style="padding:20px;display: table-cell;
                        vertical-align: inherit;
                        font-weight: 500;
                        text-align: -internal-center;text-align: inherit;font-family: 'Poppins', sans-serif;" colspan="1">
                        <p style="font-family: 'Poppins', sans-serif;"> Dr. {{$clinicData->doctor_name}}</p>
                        <p style="margin: 0;font-family: 'Poppins', sans-serif;">Clinic Address: <span style="font-weight: 400;"> {{$clinicData->address}}</span></p>
                                    </td>
                                    <td style="padding:20px;display: table-cell;
                        vertical-align: inherit;
                        font-weight: bold;
                        text-align: -internal-center;text-align: right;" colspan="2" align="right">
                                        <p style="margin-top: 0;margin-bottom: 10px;">Patient Name: <span style="font-weight: 400;">  {{$clinicData->name}}</span></p>
                                        <p style="margin-top: 0;margin-bottom: 10px;">Patient Mobile: <span style="font-weight: 400;"> +91 {{$clinicData->number}}</span></p>
                                        <p style="margin-top: 0;margin-bottom: 10px;">Patient Age: <span style="font-weight: 400;"> {{$age}}</span></p>
                                   
                                    </td>
                                </tr>
                                <tr style="border: 1px solid #ccc;">
                                    <th style="text-align: left;padding:20px;" colspan="">Date</th>
                                    <th style="text-align: left;padding:20px;">Time</th>
                                    <th style="text-align: left;padding:20px;">Token</th>
                                </tr>  
                                <tr style="border: 1px solid #ccc;">
                                    <td style="text-align: left;padding:20px;" colspan="">{{$date}}</td>
                                    <td style="text-align: left;padding:20px;">{{$label}}</td>
                                    <td style="text-align: left;padding: 20px;"> <span style="
                                        border: 2px solid #39cabb;
                                        color: #39cabb !important;
                                        font-size: 15px;
                                        text-align: center;
                                        border-radius: 5px;
                                        box-shadow: 0 20px 30px #d5edea;
                                        font-weight: 600;
                                        padding: 10px;"> {{$clinicData->token}}</span></td>
                                </tr>
                                
                                
                                <tr style="color: #033633;
                                background: linear-gradient(215deg, #39cabb 0%, #98f5eb 100%) !important;
                               ">
                                    <th style="text-align: left;padding:20px;" colspan="3"> Total: {{$clinicData->amount}}</th>
                                </tr>
                                <tr style="border: 1px solid #ccc;text-align: center;">
                                    <th style="text-align: center;padding:20px;" colspan="3">
                                    <p class="margin-bottom:30px;">Thank you for your Booking!</p>  
                                 <button onclick="downloadPDF()" style="display: inline-block;color: #fff !important;padding: 17px 26px;
                                border-radius: 30px;box-shadow: 0 20px 30px #d5edea; background: #39cabb;
                                text-decoration: none;border: none;
    font-weight: bold;font-size: 17px;margin-top:20px;">Download Appointment Slip</button> 
    <!-- Add more appointment cards for other appointments if needed -->
    <script>

        function downloadPDF() {

            window.location.href = '/invoice-data/{{$id}}';

        } 
    </script>
                                </th> 
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>
</html>

<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
   
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1>Doctor Appointment Details</h1>
    <h4>Thank you for your Booking!</h4>

    <div class="appointment-card">
        <h2>Dr. {{$clinicData->doctor_name}}</h2>
        <p><span class="label">Date:</span> <span class="value">{{$date}}</span></p>
        <p><span class="label">Time:</span> <span class="value">{{$label}}</span></p>
        <p><span class="label">Token Number:</span> <span class="value">{{$clinicData->token}}</span></p>
        <p><span class="label">Patient Name:</span> <span class="value">{{$clinicData->name}}</span></p>
        <p><span class="label">Email:</span> <span class="value">{{$clinicData->email}}</span></p>
        <p><span class="label">Phone:</span> <span class="value">+91 {{$clinicData->number}}</span></p>
        <p><span class="label">Age:</span> <span class="value">{{$age}}</span></p>
        <!-- <p><span class="label">Reason for Appointment:</span></p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nec libero at malesuada.</p>
 
    </div>

    <button onclick="downloadPDF()">Download Appointment Slip</button> 
  
    <script>

        function downloadPDF() {

            window.location.href = '/invoice-data/{{$id}}';

        }



    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>-->
