<?php

class PerfisController extends BaseController
{
    protected $perfil;

    public function __construct(Perfil $perfil)
    {
        parent::__construct();
        $this->perfil = $perfil;
    }

    //criar os metodos q o framework já fornece. os nomes tem de ser iguais

    public function index()
    {
        $nome = null;

        $sort = 'nome';
        $order = Input::get('order') === 'desc' ? 'desc' : 'asc';


        //fazer a consulta
        $perfis = $this->perfil->orderBy($sort, $order);//é igual a select * from perfis orderby nome

        //filtro
        if(Input::has('nome')){
            $perfis = $perfis->where('nome', 'LIKE', "%" . Input::get('nome') . "%");
            $nome = '&nome=' . Input::get('nome');
        }


        $perfis = $perfis->paginate(10);//numeros de registos por página

        //para segurar as configutrçaões da página
        $pagination = $perfis->appends(array(
            'nome' => Input::get('nome'),
            'sort' =>  Input::get('sort'),
            'order' => Input::get('order'),
        ))->links();

        return View::make('perfis.index')
            ->with(array(
                'nome' => Input::get('nome'),
                'perfis' => $perfis,
                'pagination' => $pagination,
                'str' => '&order=' . (Input::get('order') == 'asc' || null ? 'desc' : 'asc') . $nome
            ));
    }

    public function create()
    {
        return View::make('perfis.create');
    }

    public function store()
    {
        $input = Input::all();
        $validator = Perfil::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG001'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->perfil->create($input);

            return Redirect::to('perfil')
                ->with('sucess', Util::message('MSG002'));
        }

    }

    public function edit($id)
    {
        //verifica se id existe
        $perfil = $this->perfil->find($id);
        if(is_null($perfil)){
            return Redirect::to('perfil')
                ->with('error', Util::message('MSG003'));
        }

        return View::make('perfis.edit')
            ->with('perfil', $perfil);
    }

    public function update($id)
    {
        $input = Input::all();



        $validator = Perfil::validate($input);

        if($validator->fails()){//ISTO ESTÁ A DAR PROBLEMA
            return Redirect::back()
                ->with('error', Util::message('MSG004'))
                ->withErrors($validator)
                ->withInput();
        } else{
            $this->perfil->find($id)->update($input);

            return Redirect::to('perfil')
                ->with('success', Util::message('MSG005'));
        }
    }

    public function destroy($id)
    {
        try{
            $this->perfil->find($id)->delete();
            return Redirect::to('perfil')
                ->with('success', Util::message('MSG006'));
        } catch (Exception $e){
            return Redirect::to('perfil')
                ->with('warning', Util::message('MSG007'));
        }
    }
}