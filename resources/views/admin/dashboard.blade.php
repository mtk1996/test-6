@extends('admin.layout.master')

@section('content')
<div class="row">
    <div class="col-12">
        <h3>Order Chart</h3>
        <canvas id="order"></canvas>
    </div>
    <div class="col-6">
        <h3>ဝင်ငွေ</h3>
        <canvas id="income"></canvas>
    </div>
    <div class="col-6">
        <h3>ထွက်ငွေ</h3>
        <canvas id="outcome"></canvas>
    </div>
</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const orderCtx = document.getElementById('order');
    new Chart(orderCtx, {
      type: 'bar',
      data: {
        labels: @json($orderMonthNameArr),
        datasets: [{
          label: '# of Votes',
          data: @json($orderCountArr),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });


    const incomeCtx = document.getElementById('income');
    new Chart(incomeCtx, {
      type: 'bar',
      data: {
        labels: @json($dayArr),
        datasets: [{
          label: '# of Votes',
          data: @json($incomeArr),
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>
@endsection