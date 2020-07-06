@foreach($service_category_list as $category)
<a class="category_id" id="{{$category->id}}" href="#">{{$category->name}}</a>
@endforeach
