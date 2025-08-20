import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-display-details',
  templateUrl: './display-details.component.html',
  styleUrls: ['./display-details.component.css']
})
export class DisplayDetailsComponent implements OnInit {

  status = true;
  statusLogs = [];

  onClickEvent(event: Event) {
    this.statusLogs.push( "Timestamp " + event.timeStamp );
    this.status = !this.status;
  }

  setColor(index) {
    return index > 4 ? 'blue' : 'white';
  }

  constructor() { }

  ngOnInit() {
  }

}
