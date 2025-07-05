@component('mail::message')


<h2>Hi</h2><br>

<h4>You have {{ $messagesCount }} unread messages. Please read them.</h4>

<p>
    <h4>
        To access them, please click the button below:
    </h4>
</p>
@component('mail::button', ['url'=>route('dashboard')])
    visit website
@endcomponent


@endcomponent

