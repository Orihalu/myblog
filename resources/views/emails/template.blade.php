
Sample Notification!

A sample notification has been sent.
<p>{{Auth::user()->name}}様お問い合わせありがとうございます。</p>
<p>
  ・メールアドレス：{{$contact->email}}
</p>
<p>
  ・性別：{{$contact->gender}}
</p>
<p>
  ・お問い合わせ種類：{{$contact->type}}
</p>
<p>
  ・お問い合わせ内容<br>{!! nl2br(e($contact->body)) !!}
</p>
https://www.google.co.jp
