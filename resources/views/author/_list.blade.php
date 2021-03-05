<div class="mt-5">
    <h4 class="mb-3">登録済み</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">description</th>
                <th scope="col">look</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($authors as $author )
            <tr>
                <th scope="row">{{$author->id}}</th>
                <td>{{$author->name}}</td>
                <td>{{$author->slug}}</td>
                <td>{{$author->description}}</td>
                <td>
                    <a href="{{ action('AuthorController@show',[$articleType,$author] ) }}">
                        <i class="fas fa-link"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ action('AuthorController@edit',[$articleType,$author] ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('AuthorController@delete', [$articleType,$author] ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="taxonomy-delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>