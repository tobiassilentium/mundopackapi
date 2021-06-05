<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ordenesdetrabajo $ordenesdetrabajo
 */
echo $this->Html->script('ordenesdetrabajos/view',array('inline'=>false));
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0 text-dark">Pedido N° <?= $ordenesdetrabajo->ordenesdepedido->numero ?> - Orden de Trabajo N°<?= $ordenesdetrabajo->numero ?> - <?= $ordenesdetrabajo->estado ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><?=$this->Html->link(__('Inicio'), ['action' => 'index'], [
                      'escape' => false,
                      ]) ?>
                </li>
                <li class="breadcrumb-item active">Vista de OT's</li>
              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2">
                    <h3>Datos de OT:</h3>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <h5><span class="badge badge-info">Cliente:</span><?= $ordenesdetrabajo->ordenesdepedido->cliente->nombre ?></h5>
                  </div>
                  <div class="col-sm-3">
                    <h5><span class="badge badge-info">Fecha Pedido:</span><?= date('d-m-Y',strtotime($ordenesdetrabajo->ordenesdepedido->fecha)) ?></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Color: ') ?></span> <?= h($ordenesdetrabajo->color) ?></h5>
                  </div>
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Fuelle: ') ?></span> <?= h($ordenesdetrabajo->fuelle) ?></h5>
                  </div>
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Lamina: ') ?></span> <?= h($ordenesdetrabajo->lamina) ?></h5>
                  </div>
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Tratado: ') ?></span> <?= h($ordenesdetrabajo->tratado) ?></h5>
                  </div>
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Manija: ') ?></span> <?= h($ordenesdetrabajo->manija) ?></h5>
                    </div>
                  <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Perforación: ') ?></span> <?= h($ordenesdetrabajo->perf?'SI':'NO') ?></h5>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Medidas: ') ?></span> <?= h($ordenesdetrabajo->medida) ?></h5>
                    </div>

                    <div class="col-sm-2">
                        <h5><span class="badge badge-info"><?= __('Cantidad: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->cantidad) ?></h5>
                    </div>

                    <div class="col-sm-2">
                        <h5><span class="badge badge-info"><?= __('Peso Total: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->pesoxmil) ?></h5>
                    </div>

                    <div class="col-sm-2">
                        <h5><span class="badge badge-info"><?= __('Metros Totales: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->metrototal) ?></h5>
                    </div>
                    <div class="col-sm-2">
                        <h5><span class="badge badge-info"><?= __('Peso x Bobina: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->pesobob) ?></h5>
                    </div>

                    <div class="col-sm-2">
                        <h5><span class="badge badge-info"><?= __('Metros por bobina: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->metrobob) ?></h5>
                    </div>
                    <?php
                    $session = $this->request->getSession();
                    $user_data = $session->read('Auth.User');
                    if($user_data['role']=='superuser'){
                      ?>
                    <div class="col-sm-2">
                      <h5><span class="badge badge-info"><?= __('Precio unitario: ') ?></span> <?= h($ordenesdetrabajo->preciounitario) ?></h5>
                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                      <h5><span class="badge badge-info"><?= __('Observación: ') ?></span> <?= h($ordenesdetrabajo->observaciones) ?></h5>
                  </div>
                  <div class="col-sm-3">
                      <h5><span class="badge badge-info"><?= __('Observación Extrusion: ') ?></span> <?= h($ordenesdetrabajo->observacionesextrusion) ?></h5>
                  </div>
                  <div class="col-sm-3">
                      <h5><span class="badge badge-info"><?= __('Observación Impresion: ') ?></span> <?= h($ordenesdetrabajo->observacionesimpresion) ?></h5>
                  </div>
                  <div class="col-sm-3">
                      <h5><span class="badge badge-info"><?= __('Observación Corte: ') ?></span> <?= h($ordenesdetrabajo->observacionescorte) ?></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">
                        <h5><span class="badge badge-info"><?= __('Materiales: ') ?></span>
                          <ul>
                          <?php
                          foreach ($ordenesdetrabajo->materialesots as $key => $materialesot) {
                              ?>
                              <li><?= h($materialesot->material) ?>
                              <?= h($materialesot->porcentaje."%") ?>
                              <?= ($materialesot->porcentaje*$ordenesdetrabajo->pesoxmil/100)."KG" ?>
                              </li>
                              <?php
                          }
                          ?>
                          </ul>
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-body">
                        <h5><span class="badge badge-info"><?= __('Bobinas a extrusar: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->aextrusar) ?></h5>
                        <h5><span class="badge badge-info"><?= __('Extrusadas: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->extrusadas) ?></h5>
                        <?php
                        $totKgExtr = 0;
                        foreach ($ordenesdetrabajo->bobinasdeextrusions as $kbe=> $bobinasdeextrusion) {
                          $totKgExtr += $bobinasdeextrusion->kilogramos*1;
                        }
                        ?>
                        <h5><span class="badge badge-info"><?= __('Total Kg Extrusion: ') ?></span> <?= $this->Number->format($totKgExtr) ?></h5>
                        <?php
                        $totScrapExt = 0;
                        foreach ($ordenesdetrabajo->bobinasdeextrusions as $kbe=> $bobinasdeextrusion) {
                          $totScrapExt += $bobinasdeextrusion->scrap*1;
                        }
                        ?>
                        <h5><span class="badge badge-info"><?= __('Total de Scrap: ') ?></span> <?= $this->Number->format($totScrapExt) ?></h5>
                      </div>
                    </div>
                  </div>
                  <?php
                  if($ordenesdetrabajo->impreso){
                      $totKgImp = 0;
                      $totScrapImp = 0;
                        foreach ($ordenesdetrabajo->bobinasdeimpresions as $kbe=> $bobinasdeimpresion) {
                          $totKgImp += $bobinasdeimpresion->kilogramos*1;
                          $totScrapImp += $bobinasdeimpresion->scrap*1;
                        }
                      ?>
                      <div class="col-sm-3">
                        <div class="card">
                          <div class="card-body">
                                <h5><span class="badge badge-info"><?= __('Impresas: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->impresas) ?></h5>
                                <h5><span class="badge badge-info"><?= __('Tipo Impresion: ') ?></span> <?= $ordenesdetrabajo->tipoimpresion ?></h5>
                                <h5><span class="badge badge-info"><?= __('Total Kg Impresion: ') ?></span> <?= $this->Number->format($totKgImp) ?></h5>
                                <h5><span class="badge badge-info"><?= __('Total Scrap Impresion: ') ?></span> <?= $this->Number->format($totScrapImp) ?></h5>
                          </div>
                        </div>
                      </div>
                      <?php
                  }else{
                      ?>
                      <div class="col-sm-3">
                          <h5><span class="badge badge-info"><?= __('NO se imprime') ?></span></h5>
                      </div>
                      <?php
                  }
                  if($ordenesdetrabajo->cortado){
                    $totKgCort=0;
                    $totCantCort=0;
                    $totScrapCort=0;
                    foreach ($ordenesdetrabajo->bobinasdecortes as $kbe=> $bobinasdecorte) {
                        $totKgCort += $bobinasdecorte->kilogramos*1;
                        $totCantCort += $bobinasdecorte->cantidad*1;
                        $totScrapCort += $bobinasdecorte->scrap*1;
                    }
                    ?>
                    <div class="col-sm-3">
                      <div class="card">
                        <div class="card-body">
                          <h5><span class="badge badge-info"><?= __('Cortadas: ') ?></span> <?= $this->Number->format($ordenesdetrabajo->cortadas) ?></h5>
                          <h5><span class="badge badge-info"><?= __('Tipo Corte: ') ?></span> <?= $ordenesdetrabajo->tipocorte ?></h5>
                          <h5><span class="badge badge-info"><?= __('Total Cant Cortadas: ') ?></span> <?= $this->Number->format($totCantCort) ?></h5>
                          <h5><span class="badge badge-info"><?= __('Total Kg Corte: ') ?></span> <?= $this->Number->format($totKgCort) ?></h5>
                          <h5><span class="badge badge-info"><?= __('Total Scrap Corte: ') ?></span> <?= $this->Number->format($totScrapCort) ?></h5>
                          <?= $this->Form->control('tienecorte',['type'=>'hidden','value'=>$ordenesdetrabajo->cortado]); ?>
                          <?= $this->Form->control('tieneimpresion',['type'=>'hidden','value'=>$ordenesdetrabajo->impreso]); ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }else{
                      ?>
                      <div class="col-sm-3">
                          <h5><span class="badge badge-info"><?= __('NO se corta') ?></span></h5>
                      </div>
                      <?php
                  }
                  ?>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h5><span class="badge badge-info"><?= __('Cierre micrones: ') ?></span> <?= h($ordenesdetrabajo->cierremicrones) ?></h5>
                          </div>
                          <div class="col-sm-3">
                              <h5><span class="badge badge-info"><?= __('Cierre scrap: ') ?></span> <?= h($ordenesdetrabajo->cierrescrap) ?></h5>
                          </div>
                          <div class="col-sm-3">
                              <h5><span class="badge badge-info"><?= __('Cierre diferencia (Kg.): ') ?></span> <?= h($ordenesdetrabajo->cierrediferenciakg) ?></h5>
                          </div>
                          <div class="col-sm-3">
                              <h5><span class="badge badge-info"><?= __('Cierre: ') ?></span> <?= $ordenesdetrabajo->cierre?date('d-m-Y H:i',strtotime($ordenesdetrabajo->cierre)):'' ?></h5>
                          </div>
                          <div class="col-sm-4">
                              <h5><span class="badge badge-info"><?= __('Conclusiones: ') ?></span> <?= h($ordenesdetrabajo->concluciones) ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                 <?= $this->Html->link(__('Cerrar Ot'), [
                    'action' => 'cerrar',
                    $ordenesdetrabajo->id
                  ], [
                    "type"=>"button",
                    "class"=>"btn btn-secondary float-sm-right",
                    'escape' => false,
                  ]) ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col-sm-8">
              <h1 class="m-0 text-dark">Planificacion </h1>
          </div><!-- /.col -->
          <div class="col-sm-4">
              <h1 class="m-0 text-dark">Etapas </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Extrusora</th>
                      <th>Inicio Extrusion</th>
                      <th>Impresora</th>
                      <th>Inicio Impresion</th>
                      <th>Cortadora</th>
                      <th>Inicio Corte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($ordenesdetrabajo->ordenots as $ordenot) {
                      ?>
                      <tr>
                        <td><?= $ordenot->extrusora?$ordenot->extrusora->nombre:''; ?></td>
                        <td><?= $ordenot->fechainicioextrusora?date('d-m-Y',strtotime($ordenot->fechainicioextrusora)):''; ?></td>
                        <td><?= $ordenot->impresora?$ordenot->impresora->nombre:''; ?></td>
                        <td><?= $ordenot->fechainicioimpresora?date('d-m-Y',strtotime($ordenot->fechainicioimpresora)):''; ?></td>
                        <td><?= $ordenot->cortadora?$ordenot->cortadora->nombre:''; ?></td>
                        <td><?= $ordenot->fechainiciocortadora?date('d-m-Y',strtotime($ordenot->fechainiciocortadora)):''; ?></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card">
              <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Extrusion</th>
                      <th>Impresion</th>
                      <th>Corte</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                        $BtnClassExtrusion="warning";
                        if($ordenesdetrabajo->extrusadas <= $ordenesdetrabajo->aextrusar){
                          $BtnClasssExtrusion="warning";
                        }else{
                          $BtnClasssExtrusion="success";
                        }
                        if($ordenesdetrabajo->extrusadas==0){
                          $BtnClasssExtrusion="danger";
                        }
                        $BtnClassImpresion="warning";
                        if($ordenesdetrabajo->impresas <= $ordenesdetrabajo->aextrusar){
                          $BtnClassImpresion="warning";
                        }else{
                          $BtnClassImpresion="success";
                        }
                        if($ordenesdetrabajo->impresas==0){
                          $BtnClassImpresion="danger";
                        }
                        $BtnClassCorte="warning";
                        if($ordenesdetrabajo->cortadas <= $ordenesdetrabajo->aextrusar){
                          $BtnClassCorte="warning";
                        }else{
                          $BtnClassCorte="success";
                        }
                        if($ordenesdetrabajo->acortar==0){
                          $BtnClassCorte="danger";
                        }
                      ?>
                      <td>
                        <?=
                        $this->Form->control('aextrusar', ['type' => 'hidden','value'=>$ordenesdetrabajo->aextrusar]);
                        ?>
                        <?=
                        $this->Form->control('extrusadas', ['type' => 'hidden','value'=>$ordenesdetrabajo->extrusadas]);
                        ?>
                        <?=
                        $this->Form->control('impresas', ['type' => 'hidden','value'=>$ordenesdetrabajo->impresas]);
                        ?>
                        <?=
                        $this->Form->control('cortadas', ['type' => 'hidden','value'=>$ordenesdetrabajo->cortadas]);
                        ?>
                        <button type="button" id="btnExtruasdas" class="btn btn-<?= $BtnClassExtrusion?>"><?= ($ordenesdetrabajo->extrusadas*1)."/".($ordenesdetrabajo->aextrusar*1)?>
                        </button>
                      </td>
                      <td>
                        <?php
                        if($ordenesdetrabajo->impreso){ ?>
                          <button type="button" id="btnImpresas" class="btn btn-<?= $BtnClassImpresion?>"><?= ($ordenesdetrabajo->impresas*1)."/".($ordenesdetrabajo->aextrusar*1) ?>
                          </button>
                          <?php
                        }else{
                          ?>
                          <button type="button" class="btn btn-success">NO</button>
                          <?php
                        }?>
                      </td>
                      <td>
                        <?php
                        if($ordenesdetrabajo->cortado){ ?>
                          <button type="button" id="btnCortadas" class="btn btn-<?= $BtnClassCorte?>"><?= ($ordenesdetrabajo->cortadas*1)."/".($ordenesdetrabajo->aextrusar*1)?>
                          </button>
                        <?php
                        }else{
                          ?>
                          <button type="button" class="btn btn-success">NO</button>
                          <?php
                        }?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-2">

        </div><!-- /.row -->
        <div class="row">

        </div>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Timelime example  -->
    <div class="row">
      <div class="col-md-12">

        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="pt-2 px-3"><h3 class="card-title">Máquina</h3></li>
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-industry-tab" data-toggle="pill" href="#custom-tabs-industry" role="tab" aria-controls="custom-tabs-industry" aria-selected="true">EXTRUSORA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-print-tab" data-toggle="pill" href="#custom-tabs-print" role="tab" aria-controls="custom-tabs-print" aria-selected="false">IMPRESORA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-cut-tab" data-toggle="pill" href="#custom-tabs-cut" role="tab" aria-controls="custom-tabs-cut" aria-selected="false">CORTADORA</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-industry" role="tabpanel" aria-labelledby="custom-tabs-industry-tab">

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Bobinas cargadas en las extrusoras:</h3>
                        <button type="button" name="button" onclick="$('#modalAddBobinaEstrusion').modal('show')" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> AGREGAR</button>
                      </div>
                      <!-- ./card-header -->
                      <div class="card-body">
                        <table id="tblBobinasdeEstrusion" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Numero</th>
                              <th>Extrusora</th>
                              <th>Fecha</th>
                              <th>Extrusor</th>
                              <th>Kg.</th>
                              <th>Mts.</th>
                              <th>Scrap cant.</th>
                              <th>Observación</th>
                              <th>Terminacion</th>
                              <th>RUB</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($ordenesdetrabajo->bobinasdeextrusions as $kbe=> $bobinasdeextrusion) {
                                ?>
                                <tr>
                                  <td><?=$bobinasdeextrusion->numero; ?></td>
                                  <td><?=$bobinasdeextrusion->extrusora->nombre; ?></td>
                                  <td><?= date('d-m-Y H:m',strtotime($bobinasdeextrusion->fecha)); ?></td>
                                  <td><?=$bobinasdeextrusion->empleado->nombre; ?></td>
                                  <td><?=$bobinasdeextrusion->kilogramos; ?></td>
                                  <td><?=$bobinasdeextrusion->metros; ?></td>
                                  <td><?=$bobinasdeextrusion->scrap; ?></td>
                                  <td><?=$bobinasdeextrusion->observacion; ?></td>
                                  <td>
                                    <?php
                                    //si la terminacion es parcial vamos a agregar un icono que diga si tiene una complementaria o no
                                    $TitleChildrens="";
                                    $classIcon="fas fa-exclamation";
                                    $classButton="btn-warning";
                                    $button="";
                                    if($bobinasdeextrusion->terminacion=='Parcial'){
                                      foreach ($bobinasdeextrusion->children as $key => $childrenBobina) {
                                          $TitleChildrens .= "Bobina complementaria: ".$childrenBobina->numero;
                                          $classButton="btn-success";
                                          $classIcon = "fas fa-check";
                                      }
                                      if(count($bobinasdeextrusion->children)==0){
                                        $TitleChildrens="No tiene bobina complementaria";
                                        $classIcon="fas fa-exclamation";
                                        $classButton="btn-warning";
                                      }
                                      $button = '<button title="'.$TitleChildrens.'" type="button" name="button" class="btn '.$classButton.' btn-sm"><i class="'.$classIcon.'"></i></button>';
                                    }

                                    ?>
                                    <?=$bobinasdeextrusion->terminacion.$button; ?>

                                    </td>
                                  <td class="text-center">
                                    <button type="button" name="button" onclick="imprimirTicket(<?= $bobinasdeextrusion->id ?>)" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> Imprimir</button>
                                  </td>
                                </tr>
                                <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="custom-tabs-print" role="tabpanel" aria-labelledby="custom-tabs-print-tab">

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Bobinas cargadas en las impresoras:</h3>
                        <button type="button" name="button" onclick="$('#modalAddBobinaImpresion').modal('show')" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> AGREGAR</button>
                      </div>
                      <!-- ./card-header -->
                      <div class="card-body">
                        <table id="tblBobinasdeImpresion" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Numero</th>
                              <th>Impresora</th>
                              <th>Bobina Extrusion N°</th>
                              <th>Fecha</th>
                              <th>Impresor</th>
                              <th>Hs.</th>
                              <th>Kg.</th>
                              <th>Mts.</th>
                              <th>Scrap cant.</th>
                              <th>Terminacion</th>
                              <th>Observación</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($ordenesdetrabajo->bobinasdeimpresions as $kbi=> $bobinasdeimpresion) {
                                ?>
                                <tr>
                                  <td><?= $bobinasdeimpresion->numero; ?></td>
                                  <td><?= $bobinasdeimpresion->impresora->nombre; ?></td>
                                  <td>
                                     <?= $this->Form->control('bobinasdeextrusionDeImp'.$bobinasdeimpresion->id, [
                                      'type' => 'hidden',
                                      'value' => $bobinasdeimpresion->bobinasdeextrusion->id,
                                    ]); ?>
                                    <?= $bobinasdeimpresion->bobinasdeextrusion->numero; ?>
                                  </td>
                                  <td><?= date('d-m-Y h:m',strtotime($bobinasdeimpresion->fecha)); ?></td>
                                  <td><?= $bobinasdeimpresion->empleado->nombre; ?></td>
                                  <td><?= $bobinasdeimpresion->horas; ?></td>
                                  <td><?= $bobinasdeimpresion->kilogramos; ?></td>
                                  <td><?= $bobinasdeimpresion->metros; ?></td>
                                  <td><?= $bobinasdeimpresion->scrap; ?></td>
                                  <td>
                                  <?php
                                    //si la terminacion es parcial vamos a agregar un icono que diga si tiene una complementaria o no
                                    $TitleChildrens="";
                                    $classIcon="fas fa-exclamation";
                                    $classButton="btn-warning";
                                    $button="";
                                    if($bobinasdeimpresion->terminacion=='Parcial'){
                                      foreach ($bobinasdeimpresion->complementarias as $key => $childrenBobina) {
                                          $TitleChildrens .= "Bobina parcial con complementaria: ".$childrenBobina->numero;
                                          $classButton="btn-success";
                                          $classIcon = "fas fa-check";

                                      }
                                      if(count($bobinasdeimpresion->complementarias)==0){
                                        $TitleChildrens="No tiene bobina complementaria";
                                        $classIcon="fas fa-exclamation";
                                        $classButton="btn-warning";
                                      }
                                      $button = '<button title="'.$TitleChildrens.'" type="button" name="button" class="btn '.$classButton.' btn-sm"><i class="'.$classIcon.'"></i></button>';
                                    }
                                    if($bobinasdeimpresion->terminacion=='Complementaria'){
                                      $TitleChildrens .= "Bobina complementaria de Parcial : ".$bobinasdeimpresion->parciale->numero;
                                      $classButton="btn-success";
                                      $classIcon = "fas fa-check";
                                      $button = '<button title="'.$TitleChildrens.'" type="button" name="button" class="btn '.$classButton.' btn-sm"><i class="'.$classIcon.'"></i></button>';
                                    }
                                    ?>
                                    <?=$bobinasdeimpresion->terminacion.$button; ?>

                                  </td>
                                  <td><?= $bobinasdeimpresion->observacion; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="tab-pane fade" id="custom-tabs-cut" role="tabpanel" aria-labelledby="custom-tabs-cut-tab">

                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Bobinas cargadas en las cortadoras:</h3>
                         <button type="button" name="button" onclick="$('#modalAddBobinaCorte').modal('show')" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i> AGREGAR</button>
                      </div>
                      <!-- ./card-header -->
                      <div class="card-body">
                        <table id="tblBobinasdeCorte" class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>Fecha</th>
                              <th>Cortadora</th>
                              <th>Bobina Est N°</th>
                              <?php
                              /*
                              if($ordenesdetrabajo->impreso){
                                echo  "<th>Bobina Imp N°</th>";
                              }else{
                                echo  "<th>Bobina Est N°</th>";
                              }
                              */
                              ?>
                              <th>Fecha</th>
                              <th>Cortador</th>
                              <th>Hs.</th>
                              <th>Kg.</th>
                              <th>Mts.</th>
                              <th>Scrap .</th>
                              <th>Scrap sacabocado</th>
                              <th>Cant.</th>
                              <th>Observación</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($ordenesdetrabajo->bobinasdecortes as $kbc=> $bobinasdecorte) {
                                ?>
                                <tr>
                                  <td><?= $bobinasdecorte->numero; ?></td>
                                  <td><?= $bobinasdecorte->cortadora->nombre; ?></td>
                                  <td>
                                  <?php
                                  foreach ($bobinasdecorte['bobinascorteorigens'] as $key => $bobinaorigen) {
                                    ?>
                                    <div class="row">
                                      <div class="col-sm-2 text-nowrap"><?= $bobinaorigen->bobinasdeextrusion->numero ?></div>
                                      <div class="col-sm-8 text-truncate" title="<?= $bobinaorigen->bobinasdeextrusion->terminacion ?>"><?= $bobinaorigen->terminacion ?></div>
                                    </div>
                                    <?php
                                  }
                                  /*if($ordenesdetrabajo->impreso){
                                    ?>
                                    <div class="container">
                                    <?php
                                      foreach ($bobinasdecorte['bobinascorteorigens'] as $key => $bobinaorigen) {
                                        ?>
                                        <div class="row">
                                          <div class="col-sm-2 text-nowrap"><?= $bobinaorigen->bobinasdeimpresion->numero ?></div>
                                          <div class="col-sm-8 text-truncate" title="<?= $bobinaorigen->bobinasdeimpresion->terminacion ?>"><?= $bobinaorigen->terminacion ?></div>
                                        </div>
                                        <?php
                                      }
                                  }else{
                                    foreach ($bobinasdecorte['bobinascorteorigens'] as $key => $bobinaorigen) {
                                      ?>
                                      <div class="row">
                                        <div class="col-sm-2 text-nowrap"><?= $bobinaorigen->bobinasdeextrusion->numero ?></div>
                                        <div class="col-sm-8 text-truncate" title="<?= $bobinaorigen->bobinasdeextrusion->terminacion ?>"><?= $bobinaorigen->terminacion ?></div>
                                      </div>
                                      <?php
                                      }
                                    ?>
                                    </div> <?php
                                  }*/
                                  ?>
                                  <td><?= date('d-m-Y h:m',strtotime($bobinasdecorte->fecha)); ?></td>
                                  <td><?= $bobinasdecorte->empleado->nombre; ?></td>
                                  <td><?= $bobinasdecorte->horas; ?></td>
                                  <td><?= $bobinasdecorte->kilogramos; ?></td>
                                  <td><?= $bobinasdecorte->metros; ?></td>
                                  <td><?= $bobinasdecorte->scrap; ?></td>
                                  <td><?= $bobinasdecorte->scrapsacabocado; ?></td>
                                  <td><?= $bobinasdecorte->cantidad; ?></td>
                                  <td><?= $bobinasdecorte->observacion; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
      <!-- /.col -->
    </div>
  </div>
  <!-- /.timeline -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal" id="modalAddBobinaEstrusion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Agregar Bobina de Extrusion') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($newbobinasdeextrusion,[
            'id'=>'bobinaEstrusionAddForm',
            'url'=>[
              'controller'=>'bobinasdeextrusions',
              'action'=>'add',
            ]
        ]) ?>
        <div class="row">
            <div class="col-sm-6">
                <?= $this->Form->control('empleado_id', [
                  'empty' => ['' => 'Seleccione Empleado'],
                  'options' => $empleados,
                  'required' => true,
                ]); ?>
                <?= $this->Form->control('ordenesdetrabajo_id', ['type' => 'hidden','value'=>$ordenesdetrabajo->id]); ?>
            </div>
            <div class="col-sm-6">
                <?= $this->Form->control('extrusora_id', ['options' => $extrusoras]); ?>
            </div>
            <?php /*
            <div class="col-sm-2">
                <?= $this->Form->control('horas'); ?>
            </div>
            */ ?>

        </div>
        <div class="row">
            <div class="col-sm-6">
                <?= $this->Form->control('terminacion',[
                  'options'=>[
                    'Completa'=>'Completa',
                    'Parcial'=>'Parcial',
                    'Complementaria'=>'Complementaria',
                  ]
                ]); ?>
            </div>
            <div class="col-sm-6">
                <?= $this->Form->control('bobinasdeextrusion_id',[
                  'label'=>'Bobinas de Ext. Parciales',
                  'options'=>[],
                  'disabled'=>true,
                ]); ?>
            </div>
        </div>
         <div class="row">
            <div class="col-sm-4">
                <?= $this->Form->control('kilogramos',['required'=>true]); ?>
            </div>
            <div class="col-sm-4">
                <?= $this->Form->control('metros',['required'=>true]); ?>
            </div>
            <div class="col-sm-4">
                <?= $this->Form->control('scrap'); ?>
            </div>

            <div class="col-sm-12">
                <?= $this->Form->control('observacion'); ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#bobinaEstrusionAddForm').submit()">Agregar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<div class="modal" id="modalAddBobinaImpresion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Agregar Bobina de Impresion') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($newbobinasdeimpresion,[
            'id'=>'bobinaImpresionAddForm',
            'url'=>[
                'controller'=>'bobinasdeimpresions',
                'action'=>'add',
            ]
        ]) ?>
        <div class="row">
            <div class="col-sm-3">
                <?= $this->Form->control('empleado_id', [
                  'empty' => ['' => 'Seleccione Empleado'],
                  'options' => $empleados,
                  'required' => true,
                ]); ?>
                <?= $this->Form->control('ordenesdetrabajo_id', ['type' => 'hidden','value'=>$ordenesdetrabajo->id]); ?>
            </div>
            <div class="col-sm-3">
                <?= $this->Form->control('impresora_id', ['options' => $impresoras]); ?>
            </div>
            <div class="col-sm-3">
                <?= $this->Form->control('bobinasdeextrusion_id', [
                    'options' => [],
                    'label' => 'Bobina de extrusion',
                ]); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('horas',['type'=>'number']); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
                <?= $this->Form->control('terminacion',[
                  'options'=>[
                    'Completa'=>'Completa',
                    'Parcial'=>'Parcial',
                    'Complementaria'=>'Complementaria',
                  ]
                ]); ?>
            </div>
            <div class="col-sm-4">
                <?= $this->Form->control('bobinasdeimpresion_id',[
                  'label'=>'Bobinas de Imp. Parciales',
                  'options'=>[],
                  'disabled'=>true,
                ]); ?>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-2">
                <?= $this->Form->control('kilogramos'); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('metros'); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('scrap'); ?>
            </div>
            <div class="col-sm-12">
                <?= $this->Form->control('observacion'); ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#bobinaImpresionAddForm').submit()">Agregar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<div class="modal" id="modalAddBobinaCorte" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Agregar Bobina de Corte') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($newbobinasdecorte,[
            'id'=>'bobinaCorteAddForm',
            'url'=>[
                'controller'=>'bobinasdecortes',
                'action'=>'add',
            ]
        ]) ?>
        <div class="row">
            <div class="col-sm-3">
                <?= $this->Form->control('empleado_id', [
                  'empty' => ['' => 'Seleccione Empleado'],
                  'options' => $empleados,
                  'required' => true,
                ]); ?>
                <?= $this->Form->control('ordenesdetrabajo_id', ['type' => 'hidden','value'=>$ordenesdetrabajo->id]); ?>
            </div>
            <div class="col-sm-3">
                <?= $this->Form->control('cortadora_id', ['options' => $cortadoras]); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('horas',['type'=>'number']); ?>
            </div>
            <div class="col-sm-12 border">
              <div class="row">
                  <div class="col-sm-12">
                    <h3>Agregar Bobinas de Origen del Corte</h3>
                  </div>
                  <div class="col-sm-3">
                    <?php
                      echo $this->Form->control('origenbobinasdeextrusion_id', [
                        'options' => [],
                        'label' => 'Bobina de extrusion',
                      ]);
                      /*if($ordenesdetrabajo->impreso){
                        echo $this->Form->control('origenbobinasdeimpresion_id', [
                            'options' => [],
                            'label' => 'Bobina de impresion',
                        ]);
                      }else{
                        echo $this->Form->control('origenbobinasdeextrusion_id', [
                            'options' => [],
                            'label' => 'Bobina de extrusion',
                        ]);
                      }*/
                    ?>
                  </div>
                  <div class="col-sm-4">
                    <?= $this->Form->control('terminacion',[
                        'options'=>[
                          'Completa'=>'Completa',
                          'Parcial'=>'Parcial',
                          'Complementaria'=>'Complementaria',
                        ]
                      ]); ?>
                  </div>
                  <div class="col-sm-1" style="display: flex;align-items: flex-end;padding-bottom: 15px;">
                    <button type="button" name="button" onclick="loadBobinaOrigen()" class="btn btn-success float-sm-right"><i class="fas fa-plus"></i></button>
                  </div>
              </div>
              <div class="row" id="divRowBobinasAgregadas">


              </div>
            </div>

            <div class="col-sm-2">
                <?= $this->Form->control('kilogramos'); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('scrap'); ?>
            </div>
            <div class="col-sm-4">
                <?= $this->Form->control('scrapsacabocado',['label'=>'Scrap Sacabocado']); ?>
            </div>
            <div class="col-sm-2">
                <?= $this->Form->control('cantidad'); ?>
            </div>
            <div class="col-sm-12">
                <?= $this->Form->control('observacion'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">

            </div>

          </div>
        <?= $this->Form->end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#bobinaCorteAddForm').submit()">Agregar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<div class="modal" id="modalCerrarOT" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Cerrar Orden de Trabajo') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?= $this->Form->create($ordenesdetrabajo,[
            'id'=>'cerrarOrdenDeTrabajo',
            'url'=>[
                'action'=>'cerrar',
            ]
        ]) ?>
        <div class="row">
            <div class="col-sm-12">
                <?= $this->Form->control('id', ['type' => 'hidden','value'=>$ordenesdetrabajo->id]); ?>
                <?= $this->Form->control('observaciones'); ?>
            </div>

            <div class="col-sm-3">
                <?= $this->Form->control('cierremicrones',['label'=>'Micrones']) ?>
            </div>
            <div class="col-sm-3">
                <?= $this->Form->control('cierrescrap',['label'=>'Scrap al cierre']); ?>
            </div>
            <div class="col-sm-3">
                <?= $this->Form->control('cierrediferenciakg',['label'=>'Diferencia Kg']); ?>
            </div>
            <div class="col-sm-12">
                <?= $this->Form->control('concluciones',[
                  'label'=>'Conclusiones'
                ]); ?>
            </div>
        </div>
        <?= $this->Form->end() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="$('#cerrarOrdenDeTrabajo').submit()">Guardar Cierre</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>

<div class="modal" id="modalImprimirTicket" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?= __('Imprimiendo Ticket') ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="divPrintTicket"></div>
       
      </div>
      <div class="modal-footer">
        <?php /* <button type="button" class="btn btn-primary" onclick="$('#cerrarOrdenDeTrabajo').submit()">Guardar Cierre</button> */ ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
</div>
