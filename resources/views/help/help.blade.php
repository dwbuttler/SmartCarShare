@extends('app')

@section('content')

    <style>
        .addborder {
            border-style:solid;
            border-width:2px;
        }
    </style>
    <div class="container">
        <div class="row addborder">
            <p><img src="{{ asset('/images/bookingsHelp.png') }}"/></p>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row addborder">
            <p><img src="{{ asset('/images/membersHelp.png') }}"/></p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Bookings</h2>
            </div>
            <div class="col-md-6">
                <h2>Members</h2>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="col-md-6">
                        <p><strong>1. Create a booking:</strong> Once you are signed in, navigate to the 'Bookings' page and then click
                        'Create New Booking'. Fill in the required fields and then submit to make a booking.</p>
                        <p><strong>2. View a booking:</strong> In the 'Bookings' page, find the record you want to view the details of,
                        then click the 'View' button which is located to the right of the record.</p>
                        <p><strong>3. Update a booking:</strong> Once a booking is created, it can be modified. To do this, find the
                        'Bookings' page, then find the record you want to update and click on the 'Update' button that is found
                        to the right of the record. In the next page, modify the fields that you want, ensuring that they are valid
                        values, then click on the 'Submit' button to save changes.</p>
                        <p><strong>4. (Admin Only) Archive a booking:</strong> In the 'Bookings' page, find the record you want to archive,
                            then click the 'Archive' button which is located to the right of the record.</p>
                        <p><strong>5. (Admin Only) Delete a booking:</strong> Navigate to the 'Bookings' page, then click on the 'Delete' button.
                        A confirmation box will appear at the top of the screen, select 'Ok' and the record will be deleted.</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>6. Create a member record:</strong> From the 'Members' page, click on 'New Member' and complete the
                        needed fields before clicking on the 'Submit' button.</p>
                        <p><strong>7. View a member record:</strong> When in the 'Members' page, click on the 'View' button beside the
                        record you want to see more information about.</p>
                        <p><strong>8. Update a member record:</strong> Find the record you want to change in the 'Members' web page,
                        then click on the 'Update' button. Next fill in the fields you want to modify and click on the 'Submit' button
                        to save the changes made.</p>
                        <p><strong>9. Approve a member record:</strong> When in the 'Members' page, find the member record that you want
                        to approve and then click on 'Approve' to change the status of the member record.</p>
                        <p><strong>10. (Admin Only) Archive a member record:</strong> Navigate to the 'Members' web page, then click on
                        the 'Archive' button next to the member record you wish to archive.</p>
                        <p><strong>11. (Admin Only) Cancel a member record:</strong> Locate the member you wish to cancel the record of and
                        click on the 'Cancel' button. When prompted with a confirmation box at the top of the browser, select 'Ok'.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row addborder">
            <p><img src="{{ asset('/images/vehiclesHelp.png') }}"/></p>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row addborder">
            <p><img src="{{ asset('/images/locationsHelp.png') }}"/></p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Vehicles</h2>
            </div>
            <div class="col-md-6">
                <h2>Locations</h2>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="col-md-6">
                        <p><strong>1. Create a vehicle record:</strong> Once you are signed in, navigate to the 'Vehicles' page and then click
                            'Create New Vehicle'. Fill in the required fields and then submit to make a vehicle record.</p>
                        <p><strong>2. View a vehicle:</strong> When in the 'Vehicles' page, click on the 'View' button located
                        beside the record you want to see more information about.</p>
                        <p><strong>3. Update a vehicle:</strong> Find the vehicle record you want to modify in the 'Vehicles' page,
                         then click on the 'Update' button. Change the values you wish and then save the changes by clicking
                        on the 'Submit' button.</p>
                        <p><strong>4. (Admin Only) Dispose a vehicle:</strong> Find the vehicle record you want to dispose of, then click
                        on the 'Dispose' button located to the right of the record.</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>5. Create a location record:</strong> Once you are signed in, navigate to the 'Locations' page and then click
                            'Create New Location'. Fill in the required fields and then submit to make a location record.</p>
                        <p><strong>6. View a location:</strong> When in the 'Locations' page, click on the 'View' button located
                            beside the record you want to see more information about.</p>
                        <p><strong>7. Update a location:</strong> Find the location record you want to modify in the 'Locations' page,
                            then click on the 'Update' button. Change the values you wish and then save the changes by clicking
                            on the 'Submit' button.</p>
                        <p><strong>8. (Admin Only) Delete a location:</strong> Find the location record you want to dispose of, then click
                            on the 'Delete' button located to the right of the record.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row addborder">
            <p><img src="{{ asset('/images/archivedBookingsHelp.png') }}"/></p>
        </div>
        <div class="row">
            &nbsp;
        </div>
        <div class="row addborder">
            <p><img src="{{ asset('/images/archivedMembersHelp.png') }}"/></p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h2>Archive Bookings</h2>
            </div>
            <div class="col-md-6">
                <h2>Archive Members</h2>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="col-md-6">
                        <p><strong>1. View an archived booking:</strong> Once you are signed in, navigate to the 'Archived Bookings' page and then click
                            the 'View' button located next to the archived record you want to view.</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>2. View an archived member:</strong> Once you are signed in, navigate to the 'Archived Members' page and then click
                            the 'View' button located next to the archived record you want to view.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop