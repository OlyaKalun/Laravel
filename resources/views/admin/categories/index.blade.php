@extends ('admin.layouts.app_admin')

@section('content')
<div class="container">
  @component ('admin.components.breadcrumb')
  @slot('title') Список категорій @endslot
  @slot('parent') Головна @endslot
  @slot('active') Категорії @endslot
  @endcomponent

<hr>
<a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-square-o"></i>Створити категорію</a>
<table class="table table-striped">
  <thead>
    <th>Найменування</th>
    <th>Публікація</th>
    <th class="text-right">Дія</th>
  </thead>
  <tbody>
    @forelse($categories as $category)
    <tr>
      <td>{{$category->title}}</td>
      /**
      *щоб звернутись до властивостей колекції
      */
      <td>{{$category->published}}</td>
      <td>
        <a href="{{route('admin.category.edit',['id'=>$category->id])}}"><i class="fa fa-edit"></i></a>
        /**
        *посилання на редагування категорій
        */
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="3" class="text-center"><h2>Дані відсутні</h2></td>
    </tr>
  </tbody>
  <tfoot> <!--*підвал таблиці-->
    <tr>
      <td colspan="3" >
        <ul class="pagination pull-right">
          {{$categories->links()}}
          <!--для відмалювання посторінкового переходу-->
        </ul>
      </td>
    </tr>
  </tfoot>
</table>
@endforelse
</div>

@endsection
