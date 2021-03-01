<div class="mt-5">
    <h2>登録済み</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">description</th>
                <!-- <th scope="col">edit</th>
                <th scope="col">delete</th> -->
            </tr>
        </thead>
        <tbody>
            @forelse($articleTypes as $articleType )
            <tr>
                <th scope="row">{{$articleType->id}}</th>
                <td>{{$articleType->name}}</td>
                <td>{{$articleType->slug}}</td>
                <td>{{$articleType->description}}</td>
                <td>
                    <a href="{{ action('ArticleTypeController@edit', $articleType ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('ArticleTypeController@delete',$articleType ) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="taxonomy-delete" type="submit"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
            </tr>
            @empty

            @endforelse
        </tbody>
    </table>
</div>