<p>You have received a new message via the contact form from Schmidt:</p>

<p><strong>Name:</strong> {{ $request->input('name') }}</p>
<p><strong>Email:</strong> {{ $request->input('email') }}</p>
<p><strong>Message:</strong></p>
<p>{{ $request->input('message') }}</p>
