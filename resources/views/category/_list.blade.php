<div class="mt-5">
    <h2>登録済み</h2>
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
            @foreach($categories as $category )
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <a href="{{ action('CategoryController@show',[$articleType,$category] ) }}">
                        <i class="fas fa-link"></i>
                    </a>
                </td>
                <td>
                    <a href="{{ action('CategoryController@edit',[$articleType,$category] ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('CategoryController@delete', [$articleType,$category] ) }}" method="POST">
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