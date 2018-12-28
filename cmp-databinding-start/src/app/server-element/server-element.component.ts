import {
  Component,
  OnInit,
  Input,
  ViewEncapsulation,
  SimpleChanges,
  OnChanges,
  DoCheck,
  AfterContentInit,
  AfterContentChecked,
  AfterViewChecked,
  AfterViewInit,
  OnDestroy,
  ViewChild,
  ElementRef,
  ContentChild
} from '@angular/core';

@Component({
  selector: 'app-server-element',
  templateUrl: './server-element.component.html',
  styleUrls: ['./server-element.component.css'],
  encapsulation: ViewEncapsulation.Emulated
})
export class ServerElementComponent implements
  OnInit,
  OnChanges,
  DoCheck,
  AfterContentInit,
  AfterContentChecked,
  AfterViewInit,
  AfterViewChecked,
  OnDestroy {

  @Input('srvElement') element: {
    type: string,
    name: string,
    content: string
  };
  @Input() name: string;
  @ViewChild('heading') header: ElementRef;
  @ContentChild('contentParagraph') paragraph: ElementRef;


  constructor() {
    // console.log('constructor called!');
  }

  ngOnChanges(changes: SimpleChanges) {
    // console.log('ngOnChanges called!');
    console.log(changes);
  }

  ngOnInit() {
    // console.log('ngOnInit called!');
    console.log('ngOnInit content: ' + this.header.nativeElement.textContent);
    console.log('ngOnInit paragraph: ' + this.paragraph.nativeElement.textContent);
  }

  ngDoCheck() {
    // console.log('ngDoCheck was called!');
  }

  ngAfterContentInit() {
    // console.log('ngAfterContentInit was called!');
    console.log('ngAfterContentInit paragraph: ' + this.paragraph.nativeElement.textContent);
  }

  ngAfterContentChecked() {
    // console.log('ngAfterContentChecked was called!!');
  }

  ngAfterViewInit() {
    // console.log('ngAfterViewInit was called!!');
    console.log('ngAfterViewInit content: ' + this.header.nativeElement.textContent);
  }

  ngAfterViewChecked() {
    // console.log('ngAfterViewChecked was called!!');
  }

  ngOnDestroy() {
    // console.log('ngOnDestroyy was called!');
  }


}
