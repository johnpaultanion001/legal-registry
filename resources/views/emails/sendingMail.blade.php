@component('mail::message')


<p>Name: {{$content['name']}}</p>  
<p>Email: {{$content['email']}} </p>
<p>Phone Number: {{$content['phone_number']}} </p>
<p>Desired Country: {{$content['desired_country']}}</p>
<br>

Message: 
<br>
    {{$content['message']}}

@endcomponent
