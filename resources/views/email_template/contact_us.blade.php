 {{-- {{dd($startup_info)}} --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
     <div>
         <table style="border: 1px solid black">
            <thead>
                <tr role="row">
                    <th style="border: 1px solid black;padding: 10px">Name</th>
                    <th style="border: 1px solid black;padding: 10px">Email</th>
                    <th style="border: 1px solid black;padding: 10px">Phone Number</th>
                    <th style="border: 1px solid black;padding: 10px">Address</th>
                    <th style="border: 1px solid black;padding: 10px">Price Range</th>
                    <th style="border: 1px solid black;padding: 10px">Property Type</th>
                    {{-- <th style="border: 1px solid black;padding: 10px">Any Other Message</th> --}}
                    {{-- <th style="border: 1px solid black;padding: 10px">Attactment</th> --}}
                </tr>
                <tr>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['name']}}</td>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['email']}}</td>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['phone_number']}}</td>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['address']}}</td>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['price']}}</td>
                    <td style="border: 1px solid black;padding: 10px">{{$contact_info['property_type']}}</td>
                    {{-- <td style="border: 1px solid black;padding: 10px">{{$contact_info['message']}}</td> --}}
                    {{-- <td style="border: 1px solid black;padding: 10px">{{$contact_info['phone']}}</td> --}}
                </tr>    
            </thead>
        </table> 
       
     </div> 
     <div>
        <h1>Any Other Message</h1>
            <p>{{$contact_info['message']}}</p>
     </div>
{{-- <a href="{{ $url }}">Reset Password</a> --}}
</body>
</html>