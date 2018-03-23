<p>Trades > Categories > Component <br>Click to view component details.</p>
<div  id="menuwrapper">    
    <ul class="menu horizontal black">
    
    <?php 
    foreach ($maincats->result() as $m) //all records
    {
        echo '<li>';
        echo $m->maincat;
        
            echo '<ul>';
            foreach ($majorcats->result() as $j) //only main cats
            {
                if ($j->maincat == $m->maincat)
                {
                echo '<li>';
                echo $j->majorcat;
                    echo '<ul>';
                    foreach ($components->result() as $c)
                    {
                        if ($c->majorcat == $j->majorcat)
                        {
                            echo '<li>';
                            echo anchor('components/view/'.$c->id, $c->comp_name);
                            echo '</li>';
                        }
                    }
                    echo '<li>'.anchor('components/create/'.rawurlencode($m->maincat).'/'.rawurlencode($j->majorcat), '+ Add Component') .'</li>';
                    echo '</ul>';
                echo '</il>';
                }
            }
            echo '<li>'.anchor('majorcats/create/'.rawurlencode($m->maincat), '+ Add Category') .'</li>';
            echo '</ul>';
        echo '</li>';
        
    }
    
    echo '<li>'.anchor('maincats/create', '+ Add Trade') .'</li>';
    ?>
        
    </ul>
    
</div>