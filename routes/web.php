<?php
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }
// 預設假資料
// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ];
Route::get('/',function(){
    return redirect()->route('tasks.index');
});
// start 首頁顯示每一筆資料
Route::get('/tasks', function () {
    return view('index',[
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');
// end首頁顯示

// start 顯示create的畫面所以用view，要注意擺放位置，要在'/tasks/{id}'前面因為裡面有判斷找不到id會顯示404
Route::view('/tasks/create','create')
      ->name('tasks.create');
// end顯示create

// start edit get資料顯示編輯頁面，帶有此id顯示此id的資料
Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit',[
      'task' => $task
    ]);
})->name('tasks.edit');
// end get資料顯示編輯頁面

// start點擊個別任務顯示完整資料
// 根據url的id找到資料顯示，在show.blade得到task可以顯示那筆資料
// 如果沒有id會顯示404的畫面
Route::get('/tasks/{task}', function (Task $task) {
    return view('show',[
      'task' => $task
    ]);
})->name('tasks.show');
// end點擊個別任務顯示完整資料


// start 新增任務 post來的資料會驗證才存進$data
Route::post('/tasks',function(TaskRequest $request){
//  $data = $request->validated();
//  $task = new Task;
//  $task->title= $data['title'];
//  $task->description= $data['description'];
//  $task->long_description= $data['long_description'];
//  $task->save();
 $task = Task::create($request->validated());

//  當送出存進資料庫後會直接到show.blade.php的頁面帶有此任務id
 return redirect()->route('tasks.show',['task'=> $task->id])
      ->with('success','Task created successfully!');
})->name('tasks.store');
// end 新增任務

// start 編輯任務 post來的資料會驗證才存進$data
Route::put('/tasks/{task}',function(Task $task, TaskRequest $request){
//   $data = $request->validated();
//   $task->title= $data['title'];
//   $task->description= $data['description'];
//   $task->long_description= $data['long_description'];
//   $task->save();
$task->update( $request->validated());
 //  當送出存進資料庫後會直接到show.blade.php的頁面帶有此任務id
  return redirect()->route('tasks.show',['task'=> $task->id])
       ->with('success','Task updated successfully!');
 })->name('tasks.update');
// end 編輯任務
 
Route::delete('/tasks/{task}',function(Task $task){
    $task->delete();
    return redirect()->route('tasks.index')
    ->with('success','Task deleted successfully!');
})->name('tasks.destroy');

// test how to use route
// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hey', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

Route::fallback(function () {
    return 'Still go somewhere';
});
