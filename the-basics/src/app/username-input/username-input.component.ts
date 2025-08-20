import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-username-input',
  templateUrl: './username-input.component.html',
  styleUrls: ['./username-input.component.css']
})
export class UsernameInputComponent implements OnInit {

  userName = '';

  constructor() { }

  ngOnInit() {
  }

  onUsernameChange() {
    this.userName = '';
  }
}
