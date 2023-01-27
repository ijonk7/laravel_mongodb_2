<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('book.index', [
            'books' => $books
        ]);
    }

    public function create()
    {
        return view('book.create');
    }

    public function store(StoreBookRequest $request)
    {
        $user_id = Auth::id();
        $customer = new Book();
        $customer->title = $request->title;
        $customer->author = $request->author;
        $customer->user_id = $user_id;
        $customer->save();

        return redirect('book')->with('status', 'Book created successfully');
    }

    public function edit(Book $book)
    {
        return view('book.edit', [
            'book' => $book
        ]);
    }

    public function update(UpdateBookRequest $request)
    {
        $user_id = Auth::id();
        $customer = Book::find($request->idBook);
        $customer->title = $request->title;
        $customer->author = $request->author;
        $customer->user_id = $user_id;
        $customer->save();

        return redirect('book')->with('status', 'Book updated successfully');
    }

    public function destroy(Book $customer)
    {
        Storage::disk('public')->delete($customer->photo);
        $customer->delete();

        return redirect('dashboard')->with('status', 'Book deleted successfully');
    }

    public function hasMany()
    {
        $users = User::with('books')->get();
        dd($users);
    }

    public function hasOne()
    {
        $users = User::with('books')->get();
        dd($users);
    }

    public function insertRelatedModels()
    {
        $book = new Book([
                        'title' => 'Book 1 (Test Embeds One)',
                        'author' => 'Author 1 (Test Embeds One)',
                        'user_id' => Auth::id()
                    ]);
        $user = Auth::user();
        $user->books()->save($book);

        return 'Book created successfully';
    }
}
