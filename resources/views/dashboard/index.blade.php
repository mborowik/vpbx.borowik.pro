@extends('layouts.app')

@section('title', 'Pulpit')



@section('content')



        <div class="row">
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-phone2 icon-3x text-success"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{count($numbers)}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">Numery</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            <i class="icon-tree7 icon-3x text-indigo"></i>
                        </div>

                        <div class="media-body text-right">
                            <h3 class="font-weight-semibold mb-0">{{count($providers)}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">Łącza VOIP</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold mb-0">{{count($cdr)}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">Połączenia</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-bubbles4 icon-3x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card card-body">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="font-weight-semibold mb-0">{{round($sum,2)}}</h3>
                            <span class="text-uppercase font-size-sm text-muted">Minuty</span>
                        </div>

                        <div class="ml-3 align-self-center">
                            <i class="icon-bag icon-3x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
