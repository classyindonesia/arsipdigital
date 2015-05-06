
@foreach($menus as $list)

	@if(count($list->mst_menu_child)>0)
		<li class="dropdown">
			<a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">  
				 {!! $list->nama !!} <span class="caret"></span>
			</a>

	      <ul class="dropdown-menu" role="menu">
		      @foreach($list->mst_menu_child as $list2)
		        <li>
		        	<a @if($list2->is_internal == 0)  target="__blank" @endif href="{!! $list2->link !!}">
		        		{!! $list2->nama !!}
		        	</a>
		        </li>
		      @endforeach
	      </ul>


		</li>
	@else

		<li>
			<a @if($list->is_internal == 0)  target="__blank" @endif  href="{!! $list->link !!}">  
			  {!! $list->nama !!}
			</a>
		</li>
	@endif
@endforeach



 