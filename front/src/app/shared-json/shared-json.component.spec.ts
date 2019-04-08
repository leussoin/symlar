import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SharedJsonComponent } from './shared-json.component';

describe('SharedJsonComponent', () => {
  let component: SharedJsonComponent;
  let fixture: ComponentFixture<SharedJsonComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SharedJsonComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SharedJsonComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
