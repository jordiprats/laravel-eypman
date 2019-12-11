@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">calculadora preus</div>

                  <div class="card-body">
                      <center><img src="/img/money_paid_loop.gif" /></center>
                      <form>
                        <div class="form-group">
                          <label for="salarilabel">salari base</label>
                          <input type="number" class="form-control" id="salari" aria-describedby="salariHelp" value="250000" step="500">
                          <small id="salariHelp" class="form-text text-muted">salari brut anual</small>
                        </div>

                        <hr />

                        <div class="form-group">
                          <label for="guardialabel">hora de feina</label>
                          <input type="number" class="form-control" id="guardia" aria-describedby="guardiaHelp" disabled>
                          <small id="guardiaHelp" class="form-text text-muted">preu per hora</small>
                        </div>

                        <div class="form-group">
                          <label for="disponibilitatlabel">disponibilitat</label>
                          <input type="number" class="form-control" id="disponibilitat" aria-describedby="disponibilitatHelp" disabled>
                          <small id="disponibilitatHelp" class="form-text text-muted">preu per dia</small>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script>

    $("#salari").change(function() {

      // =+MIN(20000/1800*2.5,C5/1800*2.5)+MAX((C5-20000)/1800*1.5,0)
      var preu_guardia=Math.min(20000/1800*2.5, $("#salari").val()/1800*2.5)+Math.max(0,($("#salari").val()-20000)/1800*1.5);
      // =+C6*1.5
      var preu_disponibilitat=preu_guardia*1.5;


      $('#guardia').val(preu_guardia.toFixed(2));
      $('#disponibilitat').val(preu_disponibilitat.toFixed(2));

    });
  </script>
@endsection
