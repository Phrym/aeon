   <div ng-controller="StaffController">
   		
   		<table class="table table-hover">
   			<thead>
   				<tr>
   					<th></th>
   					<th>Name</th>
   					<th>Email</th>
   					<th>Gender</th>
   					<th>Bachelor Course</th>
   					<th>Administrative Designation</th>
   					<th>Status</th>
                  <th>Action</th>
   				</tr>
   			</thead>
    				<tr ng-repeat="(key, value) in user">
   					<td>@{{ value._id }}</td>
   					<td>@{{ value.firstname + " " + value.middlename + " " +  value.lastname }}</td>
   					<td>@{{ value.email }}</td>
   					<td>@{{ value.gender }}</td>
   					<td title="@{{ value.bachelor_degree_description }}">@{{ value.bachelor_degree }}</td>
   					<td>@{{ value.designation }}</td>
   					<td>@{{ value.status }}</td>
                  <td>
                     <span class="fa fa-pencil-square-o"></span> | <span class="fa fa-trash-o"></span>
                  </td>
   				</tr>
   			</tbody>
   		</table>
   </div>