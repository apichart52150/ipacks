<style>
.line-hight{
    line-height: 3;
}
</style>
@php
    $question = [
        'q1' => "Since the industrial revolution, man’s thirst for energy has largely been satisfied through the abundance of",
        'q2' => "fuels. However, as stocks of coal, gas and oil run out, we need to consider",
        'q3' => "sources of energy to power our factories and vehicles. There are a number of different forms of natural energy which could be",
        'q4' => ". This essay will examine some of these alternative energy sources and evaluate them in the context of Thailand’s future energy requirements. There are plenty of energy sources provided by ",
        'q5' => ". Solar power generated by the sun, wind power, hydro-electric power from reservoirs, tidal power from the sea’s waves, geothermal energy from deep within the earth’s crust, and bio-fuels to power cars all generate",
        'q6' => "amounts of energy. Some of these are already in production: for example, solar energy cells provide electricity to heat water supplies in a number of different countries, wind farms currently",
        'q7' => "large amounts of power in some European countries and numerous reservoirs supply hydroelectricity to many countries. A",
        'q8' => "benefit of using natural resources to generate power is the fact that the source is abundant and freely available. One great",
        'q9' => ", however, is that the equipment needed to harness the energy is expensive and requires huge investment. A ",
        'q10' => "drawback is the element of risk involved, especially in the case of nuclear energy. In the case of Thailand, a number of measures have been recommended to plan for",
        'q11' => "energy requirements. These include damming rivers and building hydroelectric power generators,",
        'q12' => "nuclear power stations, and developing alternative forms of bio-fuel for cars.",
        'q13' => " concerns need to be addressed,",
        'q14' => ", before a meaningful decision can be made. Rivers should not be dammed if the water supply for farming and fishing is restricted. Bio-fuel is a useful alternative source of energy for vehicles so long as not too much land is taken away from producing food",
        'q15' => ". The development of nuclear power stations poses serious",
        'q16' => " to both humans and the environment, and adequate safety measures must be in place if that is to be a viable energy source. To",
        'q17' => "up, if fossil fuels run out within the next few",
        'q18' => ", we need to put alternative plans of action in place now to avoid energy crises in the future. A long-term vision is needed to guarantee a smooth transition from fossil fuels to",
    ];

    $endQuestion = "resources, making full use of each country’s available  resources.";

    $choice = [
        'c1' => "alternative",    
        'c2' => "constructing",  
        'c3' => "crops",     
        'c4' => "decades", 
        'c5' => "disadvantage",     
        'c6' => "Environmental",   
        'c7' => "exploited",   
        'c8' => "fossil",     
        'c9' => "further",     
        'c10' => "future",      
        'c11' => "generate",      
        'c12' => "however",
        'c13' => "huge",
        'c14' => "major",
        'c15' => "natural",
        'c16' => "nature",
        'c17' => "sum",
        'c18' => "threats",
    ];
   
@endphp
<div class="row">
    <div class="col-xl-12 col-md-12">
        <div class="card-box text-dark font-16">
            <p class="lead">
                {{$pageTitle['topic']}}
            </p>
            <div class="mb-2">
                @for ($i = 1; $i <= count($question); $i++)
                    <div class="line-hight d-inline w-auto mb-2 ">
                        {{ $question['q'.$i] }}
                    </div>
                    <select class="form-control d-inline w-auto mx-2 mb-2 ">
                        <option value="">-Select-</option>
                        @foreach ($choice as $choices)
                            <option value="{{ $choices }}">{{ $choices }}</option>
                        @endforeach
                    </select>
                @endfor
                {{ $endQuestion }}
            </div>
        </div>
    </div>
</div>

@section('button-control')
    <button id="check-answer" class="btn btn-info">Check Answers</button>
@endsection

@section('js')
    <script>
        const answers = [
            "fossil", //1
            "alternative",//2
            "exploited",//3
            "nature",//4
            "huge",//5
            "generate",//6
            "major",//7
            "disadvantage",//8
            "further",//9
            "future",//10
            "constructing",//11
            "Environmental",//12
            "however",//13
            "crops",//14
            "threats",//15
            "sum",//16
            "decades",//17
            "natural",//18
        ]
        

        let score = 0

        $("#show-answer").hide(true)

        $('#check-answer').on('click', function() {
            
            $('select').each((idx, item) => {
                if($(item).val() == answers[idx]) {
                    $(item).addClass('border border-success')
                    $('<i class="fas fa-check text-success mr-2"></i>').insertAfter($(item))
                    score++
                } else {
                    $(item).addClass('border border-danger')
                    $(`<i class="fas fa-times text-danger mr-2"></i><span class="text-success mr-2">${Array.isArray(answers[idx]) ? answers[idx][1] : answers[idx]}</span>`).insertAfter($(item))
                }
            })

            if(score == answers.length){
                alert("you're awesome")
            }else{
                alert('Your score is ' + score + '/' + answers.length)
            }

            $("#check-answer").prop('disabled','true')
        })
    </script>
@stop