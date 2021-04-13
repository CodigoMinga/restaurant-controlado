@extends('templates.maincontainer')
<style></style>
@section('content')
    <div class="d-flex flex-column h-100">
        <div class="p-3 pl-4">
            <h1><i class="material-icons">layers</i> Selectores</h1>
        </div>
        <div class="scrollselection pl-4 pr-4">
            @foreach ($tables as $table)
                <a class="mesa" href="{{url('/')}}/tableorder/{{$table->id}}">
                    @if($table->tabletype_id==1)
                    <svg viewBox="0 0 44.999 44.999">
                        <g>
                            <path d="M42.558,23.378l2.406-10.92c0.18-0.816-0.336-1.624-1.152-1.803c-0.816-0.182-1.623,0.335-1.802,1.151l-2.145,9.733
                                h-9.647c-0.835,0-1.512,0.677-1.512,1.513c0,0.836,0.677,1.513,1.512,1.513h0.573l-3.258,7.713
                                c-0.325,0.771,0.034,1.657,0.805,1.982c0.19,0.081,0.392,0.12,0.588,0.12c0.59,0,1.15-0.348,1.394-0.925l2.974-7.038l4.717,0.001
                                l2.971,7.037c0.327,0.77,1.215,1.127,1.982,0.805c0.77-0.325,1.13-1.212,0.805-1.982l-3.257-7.713h0.573
                                C41.791,24.564,42.403,24.072,42.558,23.378z"/>
                            <path d="M14.208,24.564h0.573c0.835,0,1.512-0.677,1.512-1.513c0-0.836-0.677-1.513-1.512-1.513H5.134L2.99,11.806
                                C2.809,10.99,2,10.472,1.188,10.655c-0.815,0.179-1.332,0.987-1.152,1.803l2.406,10.92c0.153,0.693,0.767,1.187,1.477,1.187h0.573
                                L1.234,32.28c-0.325,0.77,0.035,1.655,0.805,1.98c0.768,0.324,1.656-0.036,1.982-0.805l2.971-7.037l4.717-0.001l2.972,7.038
                                c0.244,0.577,0.804,0.925,1.394,0.925c0.196,0,0.396-0.039,0.588-0.12c0.77-0.325,1.13-1.212,0.805-1.98L14.208,24.564z"/>
                            <path d="M24.862,31.353h-0.852V18.308h8.13c0.835,0,1.513-0.677,1.513-1.512s-0.678-1.513-1.513-1.513H12.856
                                c-0.835,0-1.513,0.678-1.513,1.513c0,0.834,0.678,1.512,1.513,1.512h8.13v13.045h-0.852c-0.835,0-1.512,0.679-1.512,1.514
                                s0.677,1.513,1.512,1.513h4.728c0.837,0,1.514-0.678,1.514-1.513S25.699,31.353,24.862,31.353z"/>
                        </g>
                    </svg>
                    @elseif($table->tabletype_id==2)
                    <svg viewBox="0 0 424.862 424.862">
                        <g>
                            <path d="M413.909,311.887c1.121-5.759,0.753-12.313-1.141-19.134c-12.417-44.727-49.571-136.302-80.446-174.018
                                c-8.102-9.897-23.71-9.042-32.759,0c-3.981,3.983-6.193,9.056-6.665,14.258c-2.424-2.242-5.498-3.79-8.891-4.233
                                c0,0-78.308-9.758-79.258-9.634h-35.611c-11.604,0-15,6.729-15,15v114.319h-26.136V125.852c0-6.065-4.935-11-11-11H11
                                c-6.065,0-11,4.935-11,11c0,0,0.038,172.145,0.038,183.28c0,12.791,10.369,23.159,23.159,23.159h22.726
                                c-1.174,4.781-1.809,9.772-1.809,14.91c0,34.504,28.076,62.574,62.585,62.574c34.507,0,62.581-28.07,62.581-62.574
                                c0-5.138-0.636-10.129-1.809-14.91h70.042v15.344c0,12.131,9.869,22,22,22h0.421c5.867,0,11.375-2.3,15.509-6.476
                                c4.134-4.177,6.377-9.707,6.318-15.574l-0.156-15.294h19.902c-1.174,4.781-1.809,9.772-1.809,14.91
                                c0,34.504,28.076,62.574,62.585,62.574c34.507,0,62.581-28.07,62.581-62.574C424.862,334.108,420.812,321.946,413.909,311.887z
                                M362.281,323.584c13.022,0,23.616,10.595,23.616,23.617s-10.594,23.617-23.616,23.617c-13.027,0-23.625-10.595-23.625-23.617
                                S349.253,323.584,362.281,323.584z M130.314,347.201c0,13.022-10.594,23.617-23.616,23.617c-13.027,0-23.625-10.595-23.625-23.617
                                s10.598-23.617,23.625-23.617C119.72,323.584,130.314,334.179,130.314,347.201z M280.78,251.816
                                c-0.123-12.103-10.07-21.948-22.173-21.948H222v-74.753l17.9,2.199c1.457,6.695,7.409,11.711,14.539,11.711h62.658l4.857,40.464
                                l-41.057,53.753L280.78,251.816z"/>
                            <path d="M182.625,103.09c24.263,0,44.002-19.739,44.002-44.003c0-3.085-0.323-6.096-0.93-9.004l9.654-0.19
                                c5.751-0.114,11.951-4.118,14.42-9.315l3.238-6.814c1.538-3.237,1.458-6.617-0.222-9.274c-1.678-2.655-4.692-4.178-8.302-4.178
                                l-40.903,0.095c-6.235-3.392-13.375-5.319-20.958-5.319c-24.263,0-44.002,19.738-44.002,44.001
                                C138.623,83.351,158.362,103.09,182.625,103.09z"/>
                        </g>
                    </svg>                
                    @else
                    <svg viewBox="0 0 512.005 512.005">
                        <g>
                            <path d="M509.123,166.723l-80-112c-3.2-4.16-8-6.72-13.12-6.72h-320c-5.12,0-9.92,2.56-13.12,6.72l-80,112
                                c-0.96,2.88-1.92,5.76-2.88,8.64c-0.32,35.52,28.48,64.64,64,64.64c19.2,0,36.16-8.32,48-21.76c11.84,13.44,28.8,21.76,48,21.76
                                s36.16-8.32,48-21.76c11.84,13.44,28.8,21.76,48,21.76s36.16-8.32,48-21.76c11.84,13.44,28.8,21.76,48,21.76s36.16-8.32,48-21.76
                                c11.84,13.44,28.8,21.76,48,21.76c35.52,0,64.32-29.12,64-64.64C511.043,172.483,510.083,169.603,509.123,166.723z"/>
                            <path d="M448.003,272.003c-16.992,0-33.536-4.544-48-12.928c-28.928,16.736-67.072,16.736-96,0c-28.928,16.736-67.104,16.736-96,0
                                c-28.896,16.736-67.104,16.736-96,0c-24.032,13.952-53.792,15.744-80,6.688v166.24c0,17.664,14.336,32,32,32h256v-160h96v160h32
                                c17.664,0,32-14.336,32-32V266.147C469.827,269.763,459.107,272.003,448.003,272.003z M224.003,400.003h-128v-96h128V400.003z"/>
                        </g>
                    </svg>
                    @endif
                    <div>{{$table->name}}</div>
                    @if($table->hasOrder())
                        <span class="material-icons ocupada">receipt_long</span>
                    @endif
                </a>
            @endforeach
        </div>
    </div>
@stop