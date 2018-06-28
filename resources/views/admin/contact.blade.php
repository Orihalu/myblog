<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


<div class="container">
  <h1>
    <a href="{{ url('/') }}" class="header-menu">Back</a>
    Contacts
  </h1>
  <h4>
<link rel="stylesheet" href="/css/styles.css">
<table class="table table-striped">
  <table class="table table-bordered">
    <thread>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Type</th>
      </tr>
  </thread>
  @forelse ($contacts as $contact)
  <tbody>
    <tr>
      <th scope="row">
        <a href="{{ action('AdminContactsController@show', $contact) }}">
        {{ $contact->id }}
        </a>
        <form>
          {{ csrf_field() }}
        </form>
     </th>
      <td>{{ $contact->email }}</td>
      <td>{{ $contact->gender }}</td>
      <td>{{ $contact->type }}</td>
    </tr>
    @empty
    <li>
     <NO CONTACTS send yet>
    </li>
  </tbody>
  @endforelse
</table>
</table>
</h4>
</div>
