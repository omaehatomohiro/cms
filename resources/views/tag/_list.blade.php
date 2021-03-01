<div class="mt-5">
    <h2>登録済み</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag )
            <tr>
                <th scope="row">{{$tag->id}}</th>
                <td>{{$tag->name}}</td>
                <td>{{$tag->slug}}</td>
                <td>
                    
                    <a href="{{ action('TagController@edit', [$articleType, $tag] ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('TagController@delete', [$articleType, $tag] ) }}" method="POST">
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