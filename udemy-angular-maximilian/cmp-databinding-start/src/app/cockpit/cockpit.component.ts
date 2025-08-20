import {
  Component,
  OnInit,
  EventEmitter,
  Output,
  ViewChild,
  ElementRef,
  OnChanges,
  SimpleChanges, DoCheck
} from '@angular/core';

@Component({
  selector: 'app-cockpit',
  templateUrl: './cockpit.component.html',
  styleUrls: ['./cockpit.component.css']
})
export class CockpitComponent implements OnInit, OnChanges {

  @Output('sCreated') serverCreated = new EventEmitter<{ serverName: string, serverContent: string}>();
  @Output('bpCreated') blueprintCreated = new EventEmitter<{ blueprintName: string, blueprintContent: string}>();

  // newServerName = '';
  // newServerContent = '';

  @ViewChild('serverNameInput') serverNameInput: ElementRef;
  @ViewChild('serverContentInput') serverContentInput: ElementRef;

  constructor() {}

  ngOnChanges(changes: SimpleChanges) {}

  ngOnInit() {}

  onAddServer() {

    console.log(this.serverNameInput);
    console.log(this.serverContentInput);

    this.serverCreated.emit({
      serverName: this.serverNameInput.nativeElement.value,
      serverContent: this.serverContentInput.nativeElement.value
    });
  }

  onAddBlueprint() {
    this.blueprintCreated.emit({
      blueprintName: this.serverNameInput.nativeElement.value,
      blueprintContent: this.serverContentInput.nativeElement.value
    });
  }

}
