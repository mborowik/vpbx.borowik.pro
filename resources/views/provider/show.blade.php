@extends('layouts.app')

@section('title', 'Karta operatora')


@section('content')

    <div class="content">

        <div class="d-flex align-items-stretch align-items-lg-start flex-column flex-lg-row">

         
            <div class="flex-1 order-2 order-lg-1">

                <div class="card">
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title"></h6>
                        <div class="header-elements">
                           
                            <div class="list-icons ml-3">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{ route('provider.edit',['provider' => $provider->id]) }}" class="dropdown-item"><i class="icon-pencil7"></i> Edytuj</a>
                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="mb-4">

                            <h4 class="font-weight-semibold mb-1">
                                <a href="#" class="text-body">{{$provider->description}} ({{$provider->sipuid}})</a>
                            </h4>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">Data dodania: {{$provider->created_at}}</li>
                                
                                <li class="list-inline-item"><a href="#" class="text-muted">{{$number_count}}</a></li>
                            </ul>

                            <div class="mb-3">
                                <pre>
                                        <?php 
                                        if($sip['response'] && $sip['response']  == 'Success'){
                                            print_r($sip);
                                        }
                                        else {
                                            echo 'Peer nie jest zarejestrowany.';
                                        }


                                        ?>
                                </pre>
                                
                                </div>

             
                        </div>


                    </div>
                </div>
               



            </div>
        


       
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-none order-1 order-lg-2 sidebar-expand-lg">

          
                <div class="sidebar-content">

                 
                    <div class="card">

                        <div class="card-header header-elements-sm-inline">
                            <span class="badge badge-success badge-pill">{{count($provider->numbers)>0?count($provider->numbers):'0'}}</span>
                            <div class="list-icons ml-3">
                                <div class="dropdown">
                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-phone-plus"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="{{route('number.add',$provider)}}" class="dropdown-item"><i class="icon-plus22"></i> Dodaj numer</a>
                                        <a href="{{route('numbers.add',$provider)}}" class="dropdown-item"><i class="icon-plus22"></i> Dodaj zakres numerów</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-group border-x-0 rounded-0">

                            @forelse ($numbers as $number)

                             <li class="media list-group-item">
                                <div class="media-body">
                                    {{$number->number}}  
                               						
									<form method="POST" action="{{ route('number.delete',['number' => $number]) }}" class="form d-inline-block" title="Delete">
										@method('delete')
										@csrf
										<button type="submit" class="btn btn-sm" title="{{ __('Delete') }}" onclick="return confirm('Czy napewno chcesz usunąć?')" ><i class="icon-trash"></i></button>
									</form>
                                    <div class="text-muted">{{$number->created_at}}  </div>
                                </div>
                             </li>


                            @empty
                            <li class="list-group-item">
                                Brak przydzielonych numerów
                            </li>
                            @endforelse

                        </ul>
                        

                        <div class="card-footer bg-light d-sm-flex justify-content-sm-between align-items-sm-center text-center text-sm-left py-sm-2">
                            <div>{{$number_count}}</div>
                            {{ $numbers->links() }}
{{-- 
                            <ul class="pagination pagination-sm pagination-pager pagination-pager-linked justify-content-between mt-2 mt-sm-0">
                                <li class="page-item disabled"><a href="#" class="page-link">← Older</a></li>
                                <li class="page-item"><a href="#" class="page-link">Newer →</a></li>
                            </ul> --}}
                        </div>
                    </div>




              
                    <div class="card">

                        <ul class="list-group border-x-0 rounded-0">

                            @forelse ($nka as $n)
            
                             <li class="media list-group-item">
                                <div class="media-body">
                                    {{$n->nr_aus}} - {{$n->wsn}}{{$n->hex}}{{$n->idl_aus}}{{$n->nr_aus}}  
                                    <div class="text-muted">{{$n->nazwa_sa}}</div><div class="text-muted">{{$n->address_sa}}</div>
                                </div>
                             </li>


                            @empty
                            <li class="list-group-item">
                                Brak wybranego obszaru alarmowego
                            </li>
                            @endforelse

                        </ul>
                       
                    </div>
               


                </div>
              

            </div>
       

        </div>
        <pre>
            @if ($config)
                {{$config}}
            @endif
        </pre>

    </div>




@endsection
