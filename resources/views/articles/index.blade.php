@extends('layouts.app')

@section('content')
    {{--<div class="row">--}}
        {{--<div class="col-md-6 card">--}}
            {{--<iframe frameborder="0"  scrolling="no" width="520" height="200" src="https://www.fctables.com/teams/manchester-united-189577/iframe/?type=team-last-match&lang_id=2&country=67&template=10&team=189577&timezone=Europe/Vilnius&time=24&width=520&height=200&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=0&scfs=22&scfc=333333&scb=1&sclg=0&teamls=80&sh=1&hfb=1&hbc=000000&hfc=FFFFFF"></iframe><div style="text-align:center;"></div>--}}
        {{--</div>--}}
        {{--<div class="col-md-6 card">--}}
            {{--<iframe frameborder="0"  scrolling="no" width="520" height="200" src="https://www.fctables.com/teams/manchester-united-189577/iframe/?type=team-next-match&lang_id=2&country=67&template=10&team=189577&timezone=Europe/Vilnius&time=24&po=1&ma=1&wi=1&dr=1&los=1&gf=1&ga=1&gd=1&pts=1&ng=1&form=1&width=520&height=700&font=Verdana&fs=12&lh=22&bg=FFFFFF&fc=333333&logo=1&tlink=0&ths=1&thb=1&thba=FFFFFF&thc=000000&bc=dddddd&hob=f5f5f5&hobc=ebe7e7&lc=333333&sh=1&hfb=1&hbc=000000&hfc=FFFFFF"></iframe><div style="text-align:center;"></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <hr>
    <table class="table table-striped">
        @foreach($articles as $article)
            <tr data-article-id="{{$article->id}}" class="article-item">
                <td>
                    <a href="https://www.google.lt" target="_blank">
                        {{$article->title}}
                    </a>
                </td>
                <td>
                    antras
                </td>
                <td>
                    trecias
                </td>
                <td>
                    ketvirtas
                </td>
                <td>
                    {{$article->time_ago}}
                </td>
            </tr>
        @endforeach
    </table>

    {{--<div class="row">--}}
        {{--@foreach($articles as $article)--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="card" >--}}
                    {{--<img class="card-img-top" src="storage/articles/{{$article->photo}}" alt="Card image cap">--}}
                    {{--<div class="card-body">--}}
                        {{--<p class="card-text">--}}
                            {{--@isset($article->video)--}}
                                {{--<span><i class="fas fa-video"></i></span>--}}
                            {{--@endisset--}}
                            {{--{{$article->title}}--}}
                            {{--<small class="text-muted">--}}
                                {{--{{$article->time_ago}}--}}
                            {{--</small>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer text-muted">--}}
                        {{----}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
@endsection

