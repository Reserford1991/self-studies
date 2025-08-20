import { Component } from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {


  serverElements = [];

  onServerAdded(
    serverData: {
      serverName: string,
      serverContent: string
    }
  ) {
    this.serverElements.push({
      type: 'server',
      name: serverData.serverName,
      content: serverData.serverContent
    });
  }

  onBlueprintAdded(
    blueprintData: {
      blueprintName: string,
      blueprintContent: string
    }
  ) {
    this.serverElements.push({
      type: 'blueprint',
      name: blueprintData.blueprintName,
      content: blueprintData.blueprintContent
    });
  }

  onChangeFirst() {
    this.serverElements[0].name = 'Changed';
  }

  onDestroyFirst() {
    this.serverElements.splice(0, 1);
  }

  iterations = [];
  oddNumbers: number[] = [];
  evenNumbers: number[] = [];
  startBtnClick(gameIteration: {
    iteration: number
  }) {
    if(gameIteration.iteration % 2 === 0) {
      this.evenNumbers.push(gameIteration.iteration);
    } else {
      this.oddNumbers.push(gameIteration.iteration);
    }

    this.iterations.push(gameIteration.iteration);
    console.log(gameIteration.iteration);
  }
}
