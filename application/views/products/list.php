<!-- 
    Fonte responsável pela listagem de produtos.    
-->

<div class="row">

    <div class="col-lg-12">
        <h2> Produtos CRUD
            <div class="pull-right">
                <a class="btn btn-primary" href="<?php echo base_url('products/create'); ?>"> Novo Produto</a>
            </div>
        </h2>    
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead> 
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $produto) { ?>                    
                <tr>
                    <td><?php echo $produto->title; ?></td>
                    <td><?php echo $produto->description; ?></td>
                    <td>
                        <form method="DELETE" action="<?php echo base_url('products/delete/'.$produto->id); ?>">
                            <a class="btn btn-info btn-xs" href="<?php echo base_url('products/edit/'.$produto->id); ?>">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <button type="submit" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</div>


