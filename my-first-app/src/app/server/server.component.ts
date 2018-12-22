import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-server',
  templateUrl: './server.component.html',
  styleUrls: ['./server.component.css']
})
export class ServerComponent implements OnInit {

  serverId: number = 10;
  serverName: string = "Localhost";
  serverStatus: string = "offline";

  getServerStatus() {
    return this.serverStatus;
  }

  constructor() { }

  ngOnInit() {
  }

}
