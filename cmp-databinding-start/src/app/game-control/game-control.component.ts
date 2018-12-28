import {
  Component,
  OnInit,
  Output,
  EventEmitter
} from '@angular/core';

@Component({
  selector: 'app-game-control',
  templateUrl: './game-control.component.html',
  styleUrls: ['./game-control.component.css']
})
export class GameControlComponent implements OnInit {

  @Output('onStartBtn') startGame = new EventEmitter<{iteration: number}>();
  @Output('onStopButton') stopGame = new EventEmitter<{}>();

  timeId;

  constructor() { }

  ngOnInit() {}

  onButtonStart() {

    let counter = 0;

    this.timeId = setInterval( () => {
        this.startGame.emit({
          iteration: counter
        });
        console.log(counter++);
    }, 1000);
  }

  onButtonStop() {
    clearInterval(this.timeId);
  }
}
