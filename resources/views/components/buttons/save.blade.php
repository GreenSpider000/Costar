@props(["small"=>""])
{{ html()->submit($text = icon('fas fa-save pe-2').__("Save"))->class('btn btn-success m-1'.(($small=='true')? ' btn-sm' : '')) }}