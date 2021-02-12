<?php

namespace App\Http\Controllers;

//use App\Branch;
use Illuminate\Http\Request;
use App\branch;
use Session;

class BranchController extends Controller
{
   
    public function index()
    {
        
    }

  
    public function create()
    {

        return view('addbranch');
        
    }

   
    public function store(Request $request)
    {
        $branch = Branch::create( $request->all() );
        if($branch){
            session::flash('addMsg','Branch Inserted Successfully');
            return redirect('addbranch');

        }
        
    }

   
    public function show()
    {

        $branches = branch::paginate(4);
        return view('branchshow',compact('branches'));
        
    }

   
    public function edit(Branch $branch,$id)
    {
        $branchs = branch::find($id);
        // echo "<pre>";
        // print_r($branchs);

        return view('edit_branch',compact('branchs'));
    }

    
    public function update(Request $request, Branch $branch,$id)
    {
        $branchUpdate = branch::find($id);
        $branchUpdate->bshort = $request->input('bshort');
        $branchUpdate->bfull = $request->input('bfull');
        $branchUpdate->save();
        return redirect('branchshow');
        
    }

    
    public function destroy(Branch $branch,$id)
    {

        $branchDelete = branch::find($id);
        $branchDelete->delete();
       return redirect('branchshow');
        
    }
}
