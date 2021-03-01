<div class="mt-5">
    <h2>登録済み</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">description</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($taxonomies as $taxonomy )
            <tr>
                <th scope="row">{{$taxonomy->id}}</th>
                <td>{{$taxonomy->name}}</td>
                <td>{{$taxonomy->slug}}</td>
                <td>{{$taxonomy->description}}</td>
                <td>
                    
                    <a href="{{ action('CategoryController@edit', $taxonomy ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('CategoryController@delete', $taxonomy ) }}" method="POST">
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