@extends('layout.layout')
@section('title', '后台首页')
@section('content')
    <h2>后台首页</h2>

    <div id="chart1" style="width: 400px; height: 400px; float: left"></div>
    <div id="chart2" style="width: 400px; height: 400px; float: right"></div>

    <script src="/assets/js/echarts.min.js"></script>
    <script src="/assets/js/jquery.min.js"></script>

    <script>

        var chartDom = document.getElementById('chart1');
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            title: {
                text: '满意度调查',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
            },
            series: [
                {
                    name: '文献满意度',
                    type: 'pie',
                    radius: '50%',
                    data: [
                        {value: 1048, name: '满意'},
                        {value: 735, name: '不满意'},
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };

        var chartDom2 = document.getElementById('chart2');
        var myChart2 = echarts.init(chartDom2);
        var option2;

        option2 = {
            title: {
                text: '建议意见',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'vertical',
                left: 'left',
            },
            series: [
                {
                    name: '问卷汇总',
                    type: 'pie',
                    radius: '50%',
                    data: [
                        {value: 1048, name: '检索结果不够精准'},
                        {value: 735, name: '检索结果不全面'},
                        {value: 735, name: '反馈时间超出规定天数'},
                        {value: 735, name: '流程繁琐'},
                        {value: 735, name: '服务态度不佳'}
                    ],
                    emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }
            ]
        };

        myChart.setOption(option);
        myChart2.setOption(option2);

        $.ajax({
            type: 'get',
            url: '/adm/show-chart',
            dataType: 'json',
            success: function (result){
                myChart.setOption({
                    series:{
                        data:[
                            {value: result['q11'], name: '满意'},
                            {value: result['q12'], name: '不满意'}
                        ]
                    }
                })
            },
            error: function (){
                alert('图标请求失败');
                myChart.hideLoading();
            }
        });

        $.ajax({
            type: 'get',
            url: '/adm/show-chart',
            dataType: 'json',
            success: function (result){
                myChart2.setOption({
                    series:{
                        data:[
                            {value: result['q21'], name: '检索结果不够精准'},
                            {value: result['q22'], name: '检索结果不全面'},
                            {value: result['q23'], name: '反馈时间超出规定天数'},
                            {value: result['q24'], name: '流程繁琐'},
                            {value: result['q25'], name: '服务态度不佳'}
                        ]
                    }
                })
            },
            error: function (){
                alert('图标请求失败');
                myChart2.hideLoading();
            }
        });

    </script>
@endsection
