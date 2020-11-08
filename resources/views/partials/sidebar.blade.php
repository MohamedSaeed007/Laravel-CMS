<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

        <h6 class="sidebar-title">Categories</h6>
        <div class="row link-color-default fs-14 lh-24">
            @foreach($categories as $category)
                <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">Tags</h6>
        <div class="gap-multiline-items-1">
            @foreach($tags as $tag)
                <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">About</h6>
        <p class="small-3">This is a Content Management System based on Laravel developed By Mohamed
            Saeed</p>


    </div>
</div>
