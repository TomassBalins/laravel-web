<x-app-layout>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}



</style>
<script>
function showInput (element) {
  test = element;
  console.log(element)
  element.children[0].style.display = "none";
  element.children[1].style.display = "block";

}
function sendInput (element) {
  //element.children[1].disabled = true;
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    console.log(element);
    //element.children[1].disabled = false;
    // element.children[0].innerHTML = newValue;
    //span
    element.parentElement.children[0].style.display = "block";
    // input
    element.style.display = "none";
  }
  test = element;
  element.name;
  element.value;
  xhttp.open("GET", "/prakse_input");
  xhttp.send();
}
</script>
<table>
  <tr>
    <th>ID</th>
    <th>DESCRIPTION</th>
    <th>USER_ID</th>
    <th>CREATED_AT</th>
    <th>UPDATED_AT</th>
  </tr>
@foreach ($tasks as $task)
  <tr>
    <td>
    {{ $task->id }}
    </td> 
    <td onclick="showInput(this)">
      <span>{{ $task->description }}</span>
      <input type="text" name="description" value="{{ $task->description }}" onchange="sendInput(this)" style="display: none" class="hide" />
    </td> 
    <td onclick="showInput(this)">
    <span>{{ $task->user_id }}</span> 
    <input value="{{ $task->user_id }}" style="display: none" class="hide" />
    </td> 
    <td onclick="showInput(this)">
    <span>{{ $task->created_at }}</span>
    <input type="date" name="created_at" value="{{ $task->created_at }}" style="display: none" class="hide" />
    </td> 
    <td onclick="showInput(this)">
    <span>{{ $task->updated_at }}</span> 
    <input type="date" name="updated_at" value="{{ $task->updated_at }}" style="display: none" class="hide" />
    </td> 
  </tr>
@endforeach
</table>
</x-app-layout>