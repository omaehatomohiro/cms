<div class="mt-5">
    <h4 class="mb-3">登録済み</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">slug</th>
                <th scope="col">category</th>
                <th scope="col">tag</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post )
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->post_title}}</td>
                <td>{{$post->post_slug}}</td>
                <td>
                    @if( isset($post->category) )
                    {{ $post->category->name }}
                    @endif
                </td>
                <td>
                    @foreach($post->tags as $tag )
                        <span>{!! $tag->name !!}</span>
                    @endforeach
                </td>
                <td>
                    
                    <a href="{{ action('PostController@edit', [$articleType, $post] ) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </td>
                <td>
                  <form action="{{ action('PostController@delete', [$articleType, $post] ) }}" method="POST">
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