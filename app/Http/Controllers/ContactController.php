<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use DateTime;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        //入力内容確認ページのviewに変数を渡して表示
        return view('confirm', [
            'inputs' => $inputs,
        ]);
    }

    public function send(ContactRequest $request)
    {
        $action = $request->get('action', 'back');
        $input = $request->except('action');

        if ($action === 'submit') {
            \Log::debug('step1',[$input]);
            $input['fullname'] = $input['first_name'] . ' ' . $input['last_name'];
            \Log::debug('step2',[$input]);
            Contact::create($input);
            return redirect('thanks');
        } else {
            return redirect('/')->withInput($input);
        }
    }

    public function thanks()
        {
            return view('thanks');
        }


    public function find()
    {
        $contacts = Contact::Paginate(10);
        $param = ['contacts' => $contacts];
        return view('find', $param);
    }

    public function search(Request $request)
        {
            $fullname = $request->get('fullname');
            $gender = $request->get('gender');
            $startdate = $request->get('startdate');
            $enddate = $request->get('enddate');
            $email = $request->get('email');



            $search_gender = [];
            if($gender === 'all') {
                $search_gender = [1, 2];
            } else {
                $search_gender = [$gender];
            }
            $list = Contact::whereIn('gender', $search_gender);

            if(!empty($fullname)) {
                $list = $list->where('fullname', $fullname);
            }
            if(!empty($email)) {
                $list = $list->where('email', $email);
            }
            if(!empty($startdate)) {
                $date = new DateTime($startdate);
                $date -> setTime(0,0,0);
                $list = $list->where('created_at', '>', $date);
            }
            if(!empty($enddate)) {
                $date = new DateTime($enddate);
                $date -> setTime(23,59,59);
                $list = $list->where('created_at', '<', $date);
            }


            // $list = $list->where('fullname', $fullname);
            // $list = $list->where('created_at', $date);
            // $list = $list->where('email', $email);
            $contacts = $list->paginate(10);
            return view('find' ,['contacts' => $contacts]);

        }

    public function delete(Request $request)
        {
            Contact::find($request->id)->delete();
                    return redirect('search');


            // $todo = Todo::find($request->id);
            // if ($todo->user_id !== $user->id) return back();
            // $todo->delete();
            // return back();
        }
}
// ->action('ContactController@index')
